
<footer>
    <h2 class="centered">More questions?</h2>
    <section id="faqs" class="section margin-auto">
        <h3 class="accordion">How does Boxeon's Subscription service work?</h3>
        <div class="panel">
            <p>Boxeon allows you to subscribe to recieve individual items, any selection of items, or a pre-determined selection of items (meal kit). You may also make one-time purchases. You can manage your orders on your Subscription page.</p>
        </div>
        <h3 class="accordion">How does Boxeon's meal kit delivery service work?</h3>
        <div class="panel">
            <p>If you're interested in experiencing Africa without leaving your home, we can send you the African
                ingredients to cook up 60+ tasty and healthy meals. You may decide on receiving a monthly shipment,
                bi-monthly shipment, quarterly shipment, or even buy just one order of food at a time! When your
                delivery day comes around, we'll send an email letting you know about its arrival. You can also pause
                all orders from your Subscription page if needed.</p>
        </div>
        <h3 class="accordion">Which food meal plans & recipes does Boxeon offer?</h3>
        <div class="panel">
            <p>The Boxeon Nigerian Staples Meal plan is the only one presently on offer. This plan consists of 15
                recipes: Black Beans Stew, Fufu, Party Jollof Rice, Nigerian Chicken Stew, Nigerian Pepper Soup, Suya
                Beef Skewers, Nigerian Okra Soup, Ata Dindin, Honey Beans Porridge, Egusi Soup, and some surprise gifts.
            </p>
        </div>
        <h3 class="accordion">How many times a month does Boxeon deliver?</h3>
        <div class="panel">
            <p>Boxeon delivers monthly, bi-monthly, or every three months. We also do one-time deliveries.</p>
        </div>
        <h3 class="accordion">Does Boxeon give nutrition & calorie information?</h3>
        <div class="panel">
            <p>Yes! Every shipment contains a breakdown of nutrients and calories for each product and a mix of
                traditional and modern recipes.</p>
        </div>
        <h3 class="accordion">Why should I choose Boxeon as my meal kit service?</h3>
        <div class="panel">
            <p>Boxeon saves you time. No matter where you are in the United States, we will deliver to your doorstep.

            </p>
            <p>Boxeon offers a money-back guarantee; if at any point during or after purchase our service does not meet
                or exceed your expectations then please contact us at ‪(646) 450-4671‬.</p>
        </div>
        <h3 class="accordion">How much does Boxeon cost?</h3>
        <div class="panel">
            <p>The cost varies. You may purchase a single item or subscription via our Shop. You may also purchase a
                meal kit plan. These all come with various prices.</p>
        </div>
        <h3 class="accordion">Does Boxeon support a healthy lifestyle?</h3>
        <div class="panel">
            <p>Absolutely! The Boxeon African staple food products are superfoods.</p>
        </div>
        <h3 class="accordion">Can I skip a month of delivery?</h3>
        <div class="panel">
            <p>Yes. To pause a delivery go to your Subscriptions page by clicking the user icon at the top right corner of this page then clicking Subscriptions.</p>
        </div>
    </section>
    <section id="banner-footer" class="section wide">
        <div class="row">
            <img id="img-gifts" loading="lazy" class="center image-how-it-works" width="70px" height="48px"
                src='{{ asset('../assets/images/gifts.svg') }}' alt="Gifts" />

            <h2 class="centered center extra-large-font">Get 16 foods + 3 surprises for the price of 1!</h2>
            <p class="centered center">Sign up and answer a survey question to qualify. Offer ends soon.</p>
        </div>
        <form id="mailing-list-form" action="/pmf/email" method="post">
            @csrf
            <div class="row">
                <div class="col-75 two-col-grid">
                    <input class="h100per" required type="email" placeholder="Primary email" name="email">
                    <input type='submit' value="SIGN UP">
                </div>
            </div>

        </form>
    </section>

    <div id="footer-content-wrapper" class="margin-top-4-em"> <span>&copy; {{ date('Y') }} Boxeon
            LLC.</span>
        <a href="/terms">Terms Of Use</a>
        <a href="/privacy">Privacy</a>
        <a href="/returns">Returns & Refunds</a>
        <a href="/about">About</a>


    </div>
    <br>
    <img id='footer-logo' loading="lazy" width="127px" height="30px"
        src='{{ asset('../assets/images/logo-black.webp') }}' alt='logo' />
    <p class='centered one-em-font'>
        244 5th Avenue, Suite 7,&nbsp;
        New York, NY 10001<br>
        service@boxeon.com<br>
        <span>646.450.4670‬</span>
    </p>
</footer>

<dialog id="dialog-feedback">
    <a href="#" class="close-dialog">X</a>
    <form>
        <fieldset class="border-bottom">
            <img class="center display-block" width="70px" height="70px" loading="lazy" src="../assets/images/b.webp"
                alt="Logo">
            <br>
            <b>
                <p class="centered">Help us serve you better</p>
            </b>

        </fieldset>
        <fieldset id="start">
            <h2>What's your feedback?</h2>
            <label id="thumb_up" class="sentiment"><span><img class="material-icons" loading="lazy"
                        src="../assets/images/thumb_up.svg" alt="Like" /></span>I like something
            </label>
            <label id="thumb_down" class="sentiment"><span><img class="material-icons" loading="lazy"
                        src="../assets/images/thumb_down.svg" alt="Dislike" /></span>I don't like
                something
            </label>
            <label id="lightbulb" class="sentiment"><span><img class="material-icons" loading="lazy"
                        src="../assets/images/lightbulb.svg" alt="Suggestion" /></span>I have a
                suggestion
            </label>
        </fieldset>
        <fieldset id="like">
            <h2>What did you like?</h2>
            <textarea name="message" placeholder="Type your feedback here"></textarea>
            <br>
            <input type="submit" class="send-feedback" value="Send feedback">
        </fieldset>
        <fieldset id="dislike">
            <h2>What didn't you like?</h2>
            <textarea name="message" placeholder="Type your feedback here"></textarea>
            <br>
            <input type="submit" class="send-feedback" value="Send feedback">
        </fieldset>
        <fieldset id="suggestion">
            <h2>What's your suggestion?</h2>
            <textarea name="message" placeholder="Type your feedback here"></textarea>
            <br>
            <input type="submit" class="send-feedback" value="Send feedback">
        </fieldset>
        <fieldset id="nps">
            <h2>On a scale of 1 to 10, how likely are you to recommend Boxeon to someone?</h2>
            <div class="ten-col-grid">
                <a class="scale" data-type-value="1" href="#">1</a>
                <a class="scale" data-type-value="2" href="#">2</a>
                <a class="scale" data-type-value="3" href="#">3</a>
                <a class="scale" data-type-value="4" href="#">4</a>
                <a class="scale" data-type-value="5" href="#">5</a>
                <a class="scale" data-type-value="6" href="#">6</a>
                <a class="scale" data-type-value="7" href="#">7</a>
                <a class="scale" data-type-value="8" href="#">8</a>
                <a class="scale" data-type-value="9" href="#">9</a>
                <a class="scale" data-type-value="10" href="#">10</a>
            </div>
            <div id="text-nps-scale">
                <p>Not likely</p>
                <span></span>
                <p>Very likely</p>
            </div>
        </fieldset>
    </form>
    <div id="feedback-thanks">
        <h2 class="text-red">Thanks for your feedback!</h2>
    </div>
</dialog>

<dialog id="m">
    <a href="#" class="close-dialog primary-color">X</a><br>
    <a href="/mealkit" class="button clearbtn">Meal Kit</a>
    <a href="/gifts" class="button clearbtn">Gifts</a>
    <a href="/shop/index?c=staple" class="button clearbtn">Staple Essentials</a>
    <a href="/shop/index?c=spice" class="button clearbtn">Seasoning Essentials</a>
    <a href="/shop/index?c=produce" class="button clearbtn">Produce</a>
    <a href="/shop/index?c=body" class="button clearbtn">Body Essentials</a>
    <a href="/shop/index?c=snack" class="button clearbtn">Snacks</a>
    <a href="/recipes" class="button clearbtn">Recipes</a>
   
</dialog>

<button id="feedback" class="button"><span class="show"><img loading="lazy" class="w24px material-icons"
            src="../assets/images/chat.svg" alt="Feedback" /></span>Feedback</button>

<div id="m-menu" class="three-col-grid">
    <a id="menu-icon" href="#" class="button white"><span><img loading="lazy" width="24" height="24"
        class="w24px mobile-chat-icon"  src="../assets/images/menu.svg" alt="Shop" /></span>Menu</a>

    <a href="/cart/index" class="white button"><span><img loading="lazy" width="30px" height="21px"
                src="../assets/images/cart.webp" alt="Cart" /></span><span
            class="cart-count text-cart-count text-yellow"></span></a>
    <button id="m-feedback" class="button m-padding-right-zero"><span class="hide mobile-chat-icon"><img
                loading="lazy" class="w24px" src="../assets/images/chat.svg"
                alt="Feedback" /></span>Feedback</button>
</div>
