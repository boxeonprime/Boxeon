<div class="div-horizontal-rule"></div>
<h2 class='text-red margin-top-2-em'>Community Comments</h2>
<br>
@if (count($comments) > 0)
    @for ($i = 0; $i < count($comments); $i++)
        <div class="review">
            <div class="three-col-grid reviewer-grid">
                <p class="bold"> <span class="margin-block-start-end"><img
                loading="lazy" class="w24px fix-comment-thumb" width="24px" height="24px" src="{{ asset("../assets/images/account_circle_black.svg")}}"
                alt="Feedback" /></span>
                
                   {{ $comments[$i]->name }}</p>
                
                <div class="stars-grid">
                    @php
                        if (isset($comments[$i])) {
                            if ($comments[$i]->stars == 5) {
                                $stars = 5;
                                $diff = 0;
                            }
                            if ($comments[$i]->stars < 5) {
                                $stars = (int) $comments[$i]->stars;
                                $diff = 5 - $stars;
                            }
                        } else {
                            $stars = 0;
                            $diff = 5;
                        }

                    @endphp

                    @for ($s = 0; $s < $stars; $s++)
                    <span><img loading="lazy" width="24" height="24" class="l-float" src="../assets/images/star.svg"
                    alt="1 Star" /></span>
                    @endfor

                    @for ($d = 0; $d < $diff; $d++)
                    <span><img loading="lazy" width="24" height="24" class="l-float" src="../assets/images/star_empty.svg"
                    alt="0 Star" /></span>
                    @endfor

                </div>
            </div>
            <div>
               
            </div>
            <p class="comment">@php echo nl2br($comments[$i]->message); @endphp</p>
        </div>
    @endfor
@else
    <div class="alert-info">
        <p><span><img loading="lazy" width="24" height="24" class="l-float" src="../assets/images/star.svg"
            alt="Black Star" /></span>&nbsp;Help future visitors with a thoughtful comment. Be the first!</p>
    </div>
@endif
<br>
<h2>Post your comment</h2>
<form class="fixed-w100per" id="form-comments" action='/blog/comment' method='post'>
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-75">
            <input type="hidden" value="{{$id}}" name="blog_id">
            <input type="text" required placeholder="First and last name" name="name">
        </div>
        <div class="col-75">
            <select name="stars" required>
                <option disabled>Select stars</option>
                <option value="5">5 stars</option>
                <option value="4">4 stars</option>
                <option value="3">3 stars</option>
                <option value="2">2 stars</option>
                <option value="1">1 star</option>
            </select>
        </div>
        <div class="col-75">
            <textarea required rows="10" cols="40" name="message" placeholder="Write something thoughtful..."></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-75">
            <input type='submit' value='POST COMMENT'>
        </div>
    </div>
</form>
<div class="div-horizontal-rule"></div>