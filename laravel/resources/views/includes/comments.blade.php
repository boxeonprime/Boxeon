<h2 class='center margin-top-4-em'>Community Comments</h2>
<br>
@if (count($comments) > 0)
    @for ($i = 0; $i < count($comments); $i++)
        <div class="review two-col-grid">
            <div class="three-col-grid reviewer-grid">
             <span class="material-icons margin-block-start-end">account_circle</span>
                
                    <p class="bold">{{ $comments[$i]->name }}</p>
                
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
                        <span class="material-icons text-black">star</span>
                    @endfor

                    @for ($d = 0; $d < $diff; $d++)
                        <span class="material-icons text-grey">star</span>
                    @endfor

                </div>
            </div>
            <div>
                <p>@php echo nl2br($comments[$i]->review); @endphp</p>
            </div>
        </div>
    @endfor
@else
    <div class="alert-info">
        <p><span class="material-icons">star</span>&nbsp;Be the first to leave a comment!</p>
    </div>
@endif
<button id="show-review-form" class="button center margin-top-4-em">WRITE A COMMENT</button>
<form class="w100per" id="form-comments" action='/comments/submit' method='post'>
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-75">
            <input type="hidden" value="{{ $product[0]->id }}" name="product">
            <input type="text" required placeholder="Name" name="name">
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
            <textarea required rows="10" cols="40" name="review" placeholder="Write a review"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-75">
            <input type='submit' value='SUBMIT'>
        </div>
    </div>
</form>