
/* GLOBAL */

var Boxeon = Boxeon || {};
var Shipping = Shipping || {};
var Cart = Shipping || {};
var Subscriptions = Subscriptions || {};
var controller = new AbortController();
var signal = controller.signal;

/**
 * Utility functions
 */

Boxeon = {

  sendAjax: function (data, back) {

    var xhttp = new XMLHttpRequest();

    xhttp.open(data.method, data.action, true);

    xhttp.setRequestHeader('Content-type', data.contentType);

    xhttp.setRequestHeader(data.customHeader, data.payload, false);

    xhttp.send();

    xhttp.onreadystatechange = function () {

      if (this.readyState == 4 && this.status == 200) {

        try {

          Boxeon.removeLoader();

        } catch (e) {

          //error
        }

        back(this.responseText);

      }
    }
  },

  removeParagraph: function () {
    alert(this);
  },

  feedback: function (string) {

    var manifest = {

      method: "POST",

      action: "/feedback/submit/" + string,

      contentType: "application/json; charset=utf-8",

      customHeader: "X-CSRF-TOKEN",

      payload: document.querySelector('meta[name="csrf-token"]').content

    }

    function callback(re) {

      Boxeon.ID = re;
    }

    Boxeon.sendAjax(manifest, callback);

  },


  deleteCookie: function (name) {

    document.cookie = name + "=;path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT";

  },


  deleteCheck: function (product) {

    let h2 = document.createElement("h3");
    h2.className = "text-red";
    let h2txt = document.createTextNode("You're about to delete this item");
    var div = document.createElement("dialog");
    div.className = "bg-yellow";
    div.id = "dialog";
    div.style.display = "block";
    let button = document.createElement("button");
    button.innerText = "CANCEL";
    let button2 = document.createElement("button");
    button2.className = "clearbtn red white";
    button2.innerText = "DELETE";
    h2.appendChild(h2txt)
    div.appendChild(h2);
    div.appendChild(button);
    div.appendChild(button2);
    document.getElementById("container").appendChild(div);

    div.showModal();

    button.addEventListener("click", function (div) {

      document.getElementById("dialog").remove();
    });

    let id = product;

    button2.addEventListener("click", function () {

      Boxeon.delete(id);

    });

  },


  delete: function (product) {

    // Update Cookie
    let newCart = [];

    let cart = JSON.parse(Boxeon.getCookie("cart"));

    for (var i = 0; i < cart.length; i++) {

      if (cart[i]["product"] != product) {

        newCart.push(cart[i]);

      }

    }

    if (cart.length > 1) {
      document.cookie = "cart=" + JSON.stringify(newCart) + ";" + "path=/";
      Boxeon.showCartTotal();
    } else {
      Boxeon.deleteCookie("cart");
    }
    location.reload();
  },

  showCartCount: function () {
    if (Boxeon.getCookie("cart")) {
      let cart = JSON.parse(Boxeon.getCookie("cart"));
      let count = cart.length;
      let span = document.getElementsByClassName("cart-count");
      for (var i = 0; i < span.length; i++) {
        let text = document.createTextNode(count);
        span[i].innerText = count;
      }
    }

  },

  showCartTotal: function () {

    if (Boxeon.getCookie("cart")) {

      const total = [];

      let cart = JSON.parse(Boxeon.getCookie("cart"));

      let count = cart.length;


      for (var i = 0; i < count; i++) {

        var cadence = cart[i]['plan'];

        var basePrice = parseInt(cart[i]['basePrice']);

        if (cadence == 1) {
          var price = basePrice;
        } else if (cadence == 2) {
          var price = basePrice + 1;
        } else if (cadence == 3) {
          var price = basePrice + 2;
        } else if (cadence == 0) {
          var price = basePrice + 3;
        }

        total.push(price * parseInt(cart[i]['quantity']));
      }

      if (total.length == 0) { return; }

      let sum = total.reduce((a, b) => a + b);

      let span = document.getElementsByClassName("cart-total");

      for (var i = 0; i < span.length; i++) {
        span[i].innerText = "$" + sum;

      }

      if (document.getElementsByClassName("checkout-total")) {
        let target = document.getElementsByClassName("checkout-total");
        for (var i = 0; i < target.length; i++) {
          target[i].innerText = "$" + (sum + 17);

        }
      }
    }
  },

  addToFlyout: function () {

    let products = JSON.parse(Boxeon.getCookie("cart"));
    let flyOut = document.getElementById("flyout");

    for (var i = 0; i < products.length; i++) {

      if (!document.getElementById(products[i]['product'] + "p")) {

        var img = document.createElement("img");
        var div = document.createElement("div");
        var p = document.createElement("p");
        var quantity = parseInt(products[i]['quantity']);
        var price = products[i]['price'] * quantity; // moved last half to own line?
        var txt = document.createTextNode("$" + price);
        div.className = "cart-item";
        div.id = products[i]["product"] + "p";
        img.src = "../assets/images/products/" + products[i]['img'];
        img.className = "h70px";
        div.appendChild(img);
        p.appendChild(txt);
        div.appendChild(p);

        if (flyOut.getElementsByClassName("cart-item")[0]) {

          flyOut.insertBefore(div, flyOut.getElementsByClassName("cart-item")[0]
          );
        } else {
          flyOut.appendChild(div);
        }
      }
    }

    Boxeon.showCartCount();
    Boxeon.showCartTotal();

  },

  generateUUID: function () {
    let time = new Date().getTime();
    if (typeof performance !== 'undefined' && typeof performance.now === 'function') {
      time += performance.now();
    }
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
      let random = (time + Math.random() * 16) % 16 | 0;
      time = Math.floor(time / 16);
      return (c === 'x' ? random : (random & 0x3 | 0x8)).toString(16);
    });
  },


  disableLink: function (link) {

    link.addEventListener("click", function () {

      controller.abort();

    });
  },


  scrollToTop: function () {

    window.scrollTo({ top: 0, behavior: 'smooth' });

  },

  loader: function () {
    if (!document.getElementsByClassName("loader")[0]) {
      let div = document.createElement("div");
      div.className = "loader";
      let container = document.getElementById("container");
      container.prepend(div);
      div.style.position = "absolute";
    }
  },

  removeLoader: function () {

    if (document.getElementsByClassName("loader")[0]) {
      var loader = document.getElementsByClassName("loader")[0];
      loader.remove();
    }
  },


  changeImageOnMouseover: function (img, src) {

    img.src = "/assets/images/" + src;

  },


  loadScript: function (url) {
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var x = document.getElementsByTagName('head')[0];
    x.appendChild(s);
  },

  slideOutCart: function () {
    if (screen.width <= 600) {
      document.getElementById("menu").className = "slideOutCart";
      document.getElementById('menu').style.display = "block";
      document.getElementById("cart_overlay").className = "cart_overlay_show";
    } else {
      document.getElementById("menu").className = "slideOutCart";
      document.getElementById('menu').style.display = "block";
      document.getElementById("cart_overlay").className = "cart_overlay_show";

    }
  },

  slideInCart: function () {
    document.getElementById("menu").className = "slideInCart";
    document.getElementById('menu').style.display = "none";
  },


  cartPush: function (a) {


    if (Boxeon.getCookie("cart")) {

      let cookie = JSON.parse(Boxeon.getCookie("cart"));

      cookie.push({
        "name": a.getAttribute("data-name"),
        "quantity": a.getAttribute("data-quantity"),
        "price": a.getAttribute("data-price"),
        "basePrice": a.getAttribute("data-basePrice"),
        "product": a.getAttribute("data-id"),
        "plan": a.getAttribute("data-plan"),
        "img": a.getAttribute("data-img")

      });

      document.cookie = "cart=" + JSON.stringify(cookie) + ";" + "path=/";

    } else {

      let cookie = [];

      cookie.push({
        "name": a.getAttribute("data-name"),
        "quantity": a.getAttribute("data-quantity"),
        "price": a.getAttribute("data-price"),
        "basePrice": a.getAttribute("data-basePrice"),
        "product": a.getAttribute("data-id"),
        "plan": a.getAttribute("data-plan"),
        "img": a.getAttribute("data-img")

      });
      document.cookie = "cart=" + JSON.stringify(cookie) + ";" + "path=/";

    }

  },



  disableButton: function (b) {

    b.disabled = true;

  },


  getCookie: function (cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {

      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(cname) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return false;
  },


  cartQuantityUpdate: function (quantity, product) {
    // Updates Cookie
    if (!Boxeon.getCookie("cart")) { return; }
    let newCart = [];
    let cart = JSON.parse(Boxeon.getCookie("cart"));
    for (var i = 0; i < cart.length; i++) {
      if (cart[i]["product"] == product) {
        cart[i]["quantity"] = quantity;

      }
      newCart.push(cart[i]);
    }
    document.cookie = "cart=" + JSON.stringify(newCart) + ";" + "path=/";
    Boxeon.showCartTotal();
  },


  cartPlanUpdate: function (cadence, product) {

    // Update Cookie
    let newCart = [];
    let cart = JSON.parse(Boxeon.getCookie("cart"));
    if (cart.length == 0) { return; }
    for (var i = 0; i < cart.length; i++) {
      if (cart[i]["product"] == product) {
        cart[i]["plan"] = cadence;
      }
      newCart.push(cart[i]);

    }

    document.cookie = "cart=" + JSON.stringify(newCart) + ";" + "path=/";
    Boxeon.showCartTotal();

  },

  cartUpdatePrice: function (quantity, product, price) {

    // Update in UI
    if (!document.getElementById("itemprice" + product)) { return; }
    var newPrice = price * quantity;
    var h2 = document.getElementById("itemprice" + product);
    h2.innerText = "$" + newPrice;

    // Update Cookie

    let newCart = [];
    let cart = JSON.parse(Boxeon.getCookie("cart"));
    for (var i = 0; i < cart.length; i++) {
      if (cart[i]["product"] == product) {
        cart[i]["price"] = price;
      }

      newCart.push(cart[i]);

    }

    document.cookie = "cart=" + JSON.stringify(newCart) + ";" + "path=/";

    Boxeon.showCartTotal();

  },

};

Shipping = {

  saveBilling: function (address) {

    var json = JSON.stringify(address);

    var manifest = {

      method: "POST",

      action: "/shipping/store?addr=" + json,

      contentType: "application/json; charset=utf-8",

      customHeader: "X-CSRF-TOKEN",

      payload: document.querySelector('meta[name="csrf-token"]').content

    }

    function callback(re) {
      Boxeon.removeLoader();

    }

    Boxeon.loader();
    Boxeon.sendAjax(manifest, callback);

  },


  saveAddress: function (address) {


    var json = JSON.stringify(address);

    var manifest = {

      method: "POST",

      action: "/shipping/address?addr=" + json,

      contentType: "application/json; charset=utf-8",

      customHeader: "X-CSRF-TOKEN",

      payload: document.querySelector('meta[name="csrf-token"]').content

    }

    function callback(re) {
      Boxeon.removeLoader();

    }

    Boxeon.loader();
    Boxeon.sendAjax(manifest, callback);

  },
};


Subscriptions = {

  recordConversion: function () {

    GTAG('event', 'conversion', {
      'send_to': 'AW-1008829526/GDl7CO_9uN8DENaIhuED',
      'transaction_id': 'sub'
    });

  },

  updateCheck: function (a) {

    let h2 = document.createElement("h3");
    h2.className = "centered text-red";
    let h2txt = document.createTextNode("You're about to update this subscription");
    var div = document.createElement("dialog");
    div.className = "bg-yellow";
    div.id = "dialog";
    div.style.display = "block";
    let button = document.createElement("button");
    button.innerText = "CANCEL";
    let button2 = document.createElement("button");
    button2.className = "clearbtn red white";
    button2.innerText = "UPDATE";
    h2.appendChild(h2txt)
    div.appendChild(h2);
    div.appendChild(button);
    div.appendChild(button2);
    document.getElementById("container").appendChild(div);

    div.showModal();

    button.addEventListener("click", function (div) {

      document.getElementById("dialog").remove();
    });

    button2.addEventListener("click", function () {

      var json = {
        "name": a.getAttribute("data-name"),
        "quantity": a.getAttribute("data-quantity"),
        "price": a.getAttribute("data-price"),
        "basePrice": a.getAttribute("data-basePrice"),
        "product": a.getAttribute("data-id"),
        "plan": a.getAttribute("data-plan"),
        "img": a.getAttribute("data-img")

      }
      Subscriptions.update(json);

    });

  },


  update: function (json) {

    var data = {
      method: "POST",
      action: "/subscription/update?order=" + json + "",
      contentType: "application/json; charset=utf-8",
      customHeader: "X-CSRF-TOKEN",
      payload: document.querySelector('meta[name="csrf-token"]').content
    }

    function callback(re) {

      if (re == 1) {

        document.getElementById("dialog").remove();
        alert("Your subscription has been scheduled for update.");
      }
    }
    Boxeon.loader();
    Boxeon.sendAjax(data, callback);
  },


  remove: function (b) {
    let box = {
      creator_id: b.getAttribute("data-id"),
      version: b.getAttribute("data-version")
    };
    let json = JSON.stringify(box);
    var data = {
      method: "POST",
      action: "/subscription/remove/" + json + "",
      contentType: "application/json; charset=utf-8",
      customHeader: "X-CSRF-TOKEN",
      payload: document.querySelector('meta[name="csrf-token"]').content
    }

    function callback(re) {

      var result = JSON.parse(re);

      if (result.errors) {

        Boxeon.dialog("Sorry! Something went wrong on our end. Please try again later.");

      } else {
        Boxeon.dialog("You've been unsubscribed.");
      }
    }
    Boxeon.loader();
    Boxeon.sendAjax(data, callback);
  },


  order: function (cart) {

    let json = JSON.stringify(cart);
    var data = {
      method: "POST",
      action: "/checkout/order?order=" + json + "",
      contentType: "application/json; charset=utf-8",
      customHeader: "X-CSRF-TOKEN",
      payload: document.querySelector('meta[name="csrf-token"]').content
    }

    function callback(re) {
      if (re == 1) {
        Boxeon.deleteCookie("cart");
        localStorage.setItem("celebrate", true);

        location.href = "/checkout/referal";
      } else {
        // inspect console
      }
    }
    Boxeon.loader();
    Boxeon.sendAjax(data, callback);
  },


  showPaymentOptions: function () {

    var iframe = document.createElement('iframe');
    iframe.id = 'iframe-checkout';
    iframe.src = '/checkout/subscription';
    document.getElementById("payment-method").appendChild(iframe);


  },

  showSubscriptions: function () {

    var data = {
      method: "POST",
      action: "../subs/get-subscriptions.php",
      contentType: "application/json; charset=utf-8",
      customHeader: "CURRENT",
      payload: 1
    }

    function callback(r) {
      alert(r);
    }
    Boxeon.loader();
    Boxeon.sendAjax(data, callback);
  },


  showRecommended: function () {
    var data = {
      method: "POST",
      action: "../subs/get-recommended.php",
      contentType: "application/json; charset=utf-8",
      customHeader: "GENERAL",
      payload: 1
    }

    function callback(r) {
      alert(r);
    }
    Boxeon.loader();
    Boxeon.sendAjax(data, callback);
  }

};


// APP
window.onload = function () {


  // Presentation: fades in pages on load
  if (document.getElementsByTagName("main")[0]) {
    document.getElementsByTagName("main")[0].classList.add("fadein");
  }
  if (document.getElementById("masthead")) {
    document.getElementById("masthead").classList.add("fadein");
  }

  // LISTENERS

  if (localStorage.getItem('celebrate') == 'true') {

    document.getElementById('container').className = 'celebrate';

    localStorage.removeItem('celebrate');

    setTimeout(function () {

      document.getElementById('container').className = null;

    }, 6000);

  }

  if (document.getElementsByClassName("delete-icon")) {

    let icons = document.getElementsByClassName("delete-icon");
    for (var i = 0; i < icons.length; i++) {

      let product = parseInt(icons[i].getAttribute("data-product"));

      icons[i].addEventListener("click", function () {

        Boxeon.deleteCheck(product);

        // icons[i].parentNode.parentNode.parentNode.parentNode.remove();

      });

    }
  }
  if (document.getElementById("show-pw")) {
    var y = document.getElementById("show-pw");
    y.addEventListener("click", function () {
      let x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }

    })
  }

  if (document.getElementsByClassName("select-plan")) {

    var selects = document.getElementsByClassName("select-plan");

    for (var i = 0; i < selects.length; i++) {

      if (selects[i].getAttribute("name") == "quantity") {

        let product = selects[i].getAttribute("data-product");
        let basePrice = parseInt(selects[i].getAttribute("data-price"));

        selects[i].addEventListener("change", function () {

          var quantity = parseInt(this.value);
          var cadence = parseInt(this.parentNode.getElementsByTagName("select")[1].value);

          if (cadence == 1) {
            var price = basePrice;
          } else if (cadence == 2) {
            var price = basePrice + 1;
          } else if (cadence == 3) {
            var price = basePrice + 2;
          } else if (cadence == 0) {
            var price = basePrice + 3;
          }

          // Update in storage/cookie
          Boxeon.cartQuantityUpdate(quantity, product);
          // Update HTML
          if (this.parentNode.parentNode.getElementsByTagName("button")[0]) {
            this.parentNode.parentNode.getElementsByTagName("button")[0].
              setAttribute("data-quantity", quantity);
          }
          //Update in UI price
          Boxeon.cartUpdatePrice(quantity, product, price);

        })

      }
    }

  }

  if (document.getElementsByClassName("select-plan")) {

    var selects = document.getElementsByClassName("select-plan");

    for (var i = 0; i < selects.length; i++) {

      if (selects[i].getAttribute("name") == "plan") {

        let product = selects[i].getAttribute("data-product");

        selects[i].addEventListener("change", function () {

          var quantity = this.parentNode.getElementsByTagName("select")[0].value;
          var cadence = this.value;
          var basePrice = parseInt(this.getAttribute("data-price"));

          if (cadence == 1) {
            var price = basePrice;
          } else if (cadence == 2) {
            var price = basePrice + 1;
          } else if (cadence == 3) {
            var price = basePrice + 2;
          } else if (cadence == 0) {
            var price = basePrice + 3;
          }
          // Update in storage
          Boxeon.cartPlanUpdate(cadence, product);
          let subButton = this.parentNode.parentNode.getElementsByTagName("button")[0];
          // Update HTML
          if (subButton) {
            this.parentNode.parentNode.getElementsByTagName("button")[0].
              setAttribute("data-plan", cadence);
            this.parentNode.parentNode.getElementsByTagName("button")[0].
              setAttribute("data-price", price);
          }

          //Update price in UI
          Boxeon.cartUpdatePrice(quantity, product, price);

        })

      }
    }

  }

  // Close Dialog
  if (document.getElementsByClassName('close-dialog')) {
    let x = document.getElementsByClassName('close-dialog');
    for (let i = 0; i < x.length; i++) {
      x[i].addEventListener('click', function () {
        this.parentNode.close();
        this.parentNode.style.display = "none";

      })
    }
  }

  if (document.getElementById('alert')) {
    document.getElementById('alert').show();
    if (document.getElementById('close-dialog')) {
      document.getElementById('close-dialog').addEventListener('click', function () {
        document.getElementById('alert').remove();
      })

    }
  }

  if (document.getElementById('exe-sub')) {
    document.getElementById('exe-sub').addEventListener('click', function () {
      Boxeon.loader();
      var a = this;
      a.disabled = "true";
      Boxeon.router(a);
    });
  }

  if (document.getElementById('cart_overlay')) {
    document.getElementById('cart_overlay').addEventListener('click', function () {
      document.getElementById('cart_overlay').className = "cart_overlay_hide";
      if (document.getElementById("myDropdown").style.display == "block") {
        document.getElementById("myDropdown").style.display = "none";
      }
      document.getElementById('menu').className = "slideInCart";
      document.getElementById('menu').style.display = "none";

    });
  }

  if (document.getElementById('btn-update-subscription')) {
    document.getElementById('btn-update-subscription').addEventListener('click', function () {
      var button = this;
      button.disabled = "true";
      Subscriptions.createUpdateUI(button);

    });
  }

  if (document.getElementsByClassName('exe-unsub')) {
    var btns = document.getElementsByClassName('exe-unsub');
    var num = btns.length;
    for (var i = 0; i < num; i++) {
      btns[i].addEventListener('click', function () {
        var a = this;
        a.disabled = "true";
        Boxeon.router(a);
      });
    }

  }

  if (document.getElementById('exe-sub-alt')) {
    document.getElementById('exe-sub-alt').addEventListener('click', function () {
      var a = this;
      Boxeon.loader();
      a.disabled = "true";
      Boxeon.router(a);
    });
  }


  if (document.getElementsByClassName('sub-update')) {
    let btns = document.getElementsByClassName('sub-update');
    var total = btns.length;
    for (var i = 0; i < total; i++) {
      btns[i].addEventListener('click', function () {
        let a = this;
        Subscriptions.updateCheck(a);

      });
    }
  }


  /*if (document.getElementsByClassName('cart-add')) {
    let btns = document.getElementsByClassName('cart-add');
    var total = btns.length;
    for (var i = 0; i < total; i++) {
      btns[i].addEventListener('click', function () {
        let a = this;
        Boxeon.cartPush(a);
        Boxeon.slideOutCart();
        Boxeon.addToFlyout();

      });
    }
  }*/

  if (document.getElementsByClassName('plan-option')) {

    let isValid = false;
    let btns = document.getElementsByClassName('plan-option');
    var total = btns.length;
    for (var i = 0; i < total; i++) {
      btns[i].addEventListener('click', function () {

        let a = this;
        var check = a.getElementsByClassName("check-circle")[0];

        if (check.style.display == "block") {

          check.style.display = "none";

          // Check all options to see if not selected
          let options = document.getElementsByClassName("check-circle");
          for (var i = 0; i < options.length; i++) {
            if (options[i].style.display == "block") {

             isValid = true; break;

            }
          }
          if (isValid == false) {
           
            document.getElementById("warning").style.visibility = "visible";
          }

        // -ve Update button data
        var btn = document.getElementById("select-plan");

        if(btn.getAttribute("data-name")){

          var planName = btn.getAttribute("data-name");

          var regex = a.getAttribute("data-type-name");

          var replacedstring = planName.replace(regex, ''); 

          btn.setAttribute("data-name", replacedstring );

        
        }

        } else {

          check.style.display = "block";
          if (document.getElementById("warning").style.visibility == "visible") {
            document.getElementById("warning").style.visibility = "hidden";
          }
          
                  //Update button data
        var btn = document.getElementById("select-plan");
        if(btn.getAttribute("data-name")){

          var planName = btn.getAttribute("data-name");
          var newString = planName + " " + a.getAttribute("data-type-name");
          btn.setAttribute("data-name", newString );

        }else{
         btn.setAttribute("data-name", a.getAttribute("data-type-name") );
        }
        }

      });
 
    }
  }
  if (document.getElementsByClassName('plan-recipes')) {
    let btns = document.getElementsByClassName('plan-recipes');
    var total = btns.length;
    for (var i = 0; i < total; i++) {
      btns[i].addEventListener('click', function () {
        let a = this;
        if (a.style.backgroundColor == "green") {
          a.style.backgroundColor = null;
          a.style.color = "black";
        } else {
          a.style.backgroundColor = "green";
          a.style.color = "white";
        }
      });
    }
  }
  if (document.getElementsByClassName('plan-people')) {
    let btns = document.getElementsByClassName('plan-people');
    var total = btns.length;
    for (var i = 0; i < total; i++) {
      btns[i].addEventListener('click', function () {
        let a = this;
        if (a.style.backgroundColor == "green") {
          a.style.backgroundColor = null;
          a.style.color = "black";
        } else {
          a.style.backgroundColor = "green";
          a.style.color = "white";
        }

      });
    }
  }

  if (document.getElementsByClassName('cart-add')) {
    let btns = document.getElementsByClassName('cart-add');
    var total = btns.length;
    for (var i = 0; i < total; i++) {
      btns[i].addEventListener('click', function () {
        let a = this;
        Boxeon.cartPush(a);
        location.assign("/checkout/index")

      });
    }
  }

  // Cart Ready State

  Boxeon.showCartCount();
  Boxeon.showCartTotal();

  // Reviews
  if (document.getElementById('show-review-form')) {
    document.getElementById('show-review-form').addEventListener('click', function () {
      document.getElementById('form-reviews').style.display = "block";

    });
  }

  // Feedback 
  if (document.getElementById('feedback')) {
    let d = document.getElementById('feedback');
    d.addEventListener('click', function () {
      document.getElementById('dialog-feedback').show();
      document.getElementById('dialog-feedback').style.display = "block";

    });
  }
  if (document.getElementById('m-feedback')) {
    let d = document.getElementById('m-feedback');
    d.addEventListener('click', function () {
      document.getElementById('dialog-feedback').show();
      document.getElementById('dialog-feedback').style.display = "block";
    });
  }

  if (document.getElementsByClassName('sentiment')) {

    let choices = document.getElementsByClassName('sentiment');

    var num = choices.length;

    for (let i = 0; i < num; i++) {

      choices[i].addEventListener('click', function () {

        var feedback = choices[i].id;

        document.getElementById('start').style.display = "none";

        if (feedback == "thumb_up") {

          document.getElementById('like').style.display = "block";

        }
        if (feedback == "thumb_down") {

          document.getElementById('dislike').style.display = "block";
        }
        if (feedback == "lightbulb") {

          document.getElementById('suggestion').style.display = "block";

        }

        var data = { "sentiment": choices[i].id };

        Boxeon.feedback(JSON.stringify(data));

      });
    }

  }


  if (document.getElementsByClassName('send-feedback')) {
    let choices = document.getElementsByClassName('send-feedback');
    var num = choices.length;
    for (let i = 0; i < num; i++) {
      choices[i].addEventListener('click', function (event) {
        event.preventDefault();
        var message = this.parentNode.getElementsByTagName("textarea")[0].value;
        this.parentNode.style.display = "none";
        document.getElementById('nps').style.display = "block";

        Boxeon.feedback(JSON.stringify({ "message": message, "id": Boxeon.ID }));
        return false;
      });
    }
  }
  if (document.getElementsByClassName('scale')) {
    let choices = document.getElementsByClassName('scale');
    var num = choices.length;
    for (let i = 0; i < num; i++) {
      choices[i].addEventListener('click', function (event) {
        event.preventDefault();
        var scale = choices[i].getAttribute("data-type-value");
        this.parentNode.parentNode.style.display = "none";
        document.getElementById('feedback-thanks').style.display = "block";
        Boxeon.feedback(JSON.stringify({ "nps": scale, "id": Boxeon.ID }));
        return false;
      });
    }
  }


  // Sign Out
  if (document.getElementById('signout')) {
    document.getElementById('signout').addEventListener('click', function () {
      Boxeon.signOut();
    });
  }

  if (document.getElementById('showDropdown')) {
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    document.getElementById('showDropdown').addEventListener('click', function () {
      document.getElementById("myDropdown").style.display = "block";
      document.getElementById("cart_overlay").className = "cart_overlay_show";


    });

  }


  if (document.getElementById('show-disabled')) {
    document.getElementById('show-disabled').addEventListener('click', function () {
      Boxeon.showDisabled();
    });
  }
  if (document.getElementById('disable')) {
    document.getElementById('disable').addEventListener('click', function () {
      Boxeon.disable();
    });
  }


  if (document.getElementById('video-place-holder')) {
    var loc = document.getElementById('video-place-holder');
    loc.scrollIntoView({ behavior: 'smooth' });
  }

  // Save shipping address

  if (document.getElementById("shipping-address")) {
    let div = document.getElementById("shipping-address");
    div.addEventListener("submit", function (event) {
      event.preventDefault();
      let array = [];
      var formData = new FormData(this);

      div.style.display = "none";
      for (var [key, value] of formData) {
        array.push(value);
        if (value == 0) {

          document.getElementById("billing-address").style.display = "block";

        } else if (value == 1) {
          var pre = document.getElementsByClassName("preview");
          for (var xe = 0; xe < pre.length; xe++) {
            if (pre[xe].getAttribute("data-type-id") == "billing-address") {
              pre[xe].innerText = array[2] + " ...";
            }
          }
        }

      }

      var p = document.getElementsByClassName("preview");
      for (var x = 0; x < p.length; x++) {
        if (p[x].getAttribute("data-type-id") == div.id) {
          p[x].innerText = array[2] + " ...";
        }
      }
      Boxeon.scrollToTop();

      var arr = {
        "given_name": array[0],
        "family_name": array[1],
        "address_line_1": array[2],
        "address_line_2": array[3],
        "admin_area_1": array[4],
        "admin_area_2": array[5],
        "postal_code": array[7],
        "country_code": array[6]
      }

      Shipping.saveAddress(arr);

    });
  }

  // Saves billing address
  if (document.getElementById("billing-address")) {
    let div = document.getElementById("billing-address");
    div.addEventListener("submit", function (event) {
      event.preventDefault();
      let array = [];
      var formData = new FormData(this);
      //  div.classList.add("fadeout");
      div.style.display = "none";
      for (var [key, value] of formData) {
        array.push(value);

      }
      var p = document.getElementsByClassName("preview");
      for (var x = 0; x < p.length; x++) {
        if (p[x].getAttribute("data-type-id") == div.id) {
          p[x].innerText = array[2] + " ...";
        }
      }

      document.getElementById("payment").style.display = "block";

      var arr = {
        "billing_given_name": array[0],
        "billing_family_name": array[1],
        "billing_address_line_1": array[2],
        "billing_address_line_2": array[3],
        "billing_admin_area_1": array[4],
        "billing_admin_area_2": array[5],
        "billing_postal_code": array[7],
        "billing_country_code": array[6]
      }

      Shipping.saveBilling(arr);
      Boxeon.scrollToTop();

    });
  }

  //Checkout
  if (document.getElementsByClassName("cartcheckout")) {
    let form = document.getElementsByClassName("cartcheckout");
    for (let i = 0; i < form.length; i++) {
      form[i].addEventListener("submit", function (event) {
        event.preventDefault();
        //LinkedIn
        //  window.lintrk('track', { conversion_id: 9365452 });
        document.cookie = "checkout=" + "/checkout/index" + ";" + "path=/";
        location.assign("/checkout/index");
      });
    }
  }

  // Place order
  if (document.getElementsByClassName("place-order")) {
    let form = document.getElementsByClassName("place-order");
    for (let i = 0; i < form.length; i++) {
      form[i].addEventListener("submit", function (event) {
        event.preventDefault();
        Boxeon.disableButton(this.querySelector('[type=submit]'));
        let cart = Boxeon.getCookie("cart");
        Subscriptions.order(cart);

      });
    }
  }

  // Checkout page EDIT buttons
  if (document.getElementById("billing-address")) {
    let btns = document.getElementsByClassName("edit-btn");
    for (let i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function () {
        var id = btns[i].getAttribute("data-type-id");
        document.getElementById(id).style.display = "block";
      });
    }

  }


  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'G-ZLWPCSLD0Q');

  // Close the dropdown menu if the user clicks outside of it

  window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  if (document.getElementsByClassName("loader")[0]) {
    Boxeon.removeLoader();
  }

  if (document.getElementById('menu-icon')) {
    document.getElementById('menu-icon').addEventListener("click", function () {
      document.getElementById("m").show();
      document.getElementById("m").style.display = "block";
    });
  }

  if (document.getElementsByClassName('view-plans')) {
    var buttons = document.getElementsByClassName('view-plans');
    var num = buttons.length;
    for (var i = 0; i < num; i++) {

      buttons[i].addEventListener("click", function () {
        location.assign("/plans");
      });

    }

  }


} // listeners end

if (!document.getElementsByClassName("loader")[0]) {

  let div = document.createElement("div");

  div.className = "loader";

  if (document.getElementById("container")) {

    let container = document.getElementById("container");

  } else if (document.getElementById("m-window")) {

    let container = document.getElementById("m-window");
  }

  container.prepend(div);

  div.style.position = "absolute";
}
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;

    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";

    }
  });
}

