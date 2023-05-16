
<form action="track" method="get">
    <div class="col-12 input-group mb-3" style="border: 1px solid #29374B !important; border-radius: 12px !important;">
        <div class="col form-floating">
            <input type="text" class="form-control shadow-none bg-none" value="<?= (isset($_GET['trackid']) && !empty($_GET['trackid'])) ? $_GET['trackid'] : '' ?>" name="trackid" id="track_order<?= (isset($alt_id)) ? $alt_id: '' ?>_val" placeholder="Type your track number" style="border-radius: 12px 0px 0px 12px !important;" >
            <label for="floatingInput">Type your track number</label>
        </div>

        <button id="track_order<?= (isset($alt_id)) ? $alt_id: '' ?>" type="button" class="track_order input-group-text">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</form>
