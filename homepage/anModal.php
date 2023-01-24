<!-- Announcement Modal -->
<section id="announcement">
    <?php 
$announce = get_announcement();
foreach($announce as $rows => $value1): ?>

    <!-- Modal -->
    <div class="modal fade" id="announce-<?php echo $value1['hp_id']; ?>" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo $value1['hp_title']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $value1['hp_desc'];
        if(!empty($value1['hp_pic'])): ?>
                    <div>
                    <img src="<?php echo $value1['hp_pic'];?>" class="img-fluid" alt="">
                    </div>
                    <?php endif; ?>
                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>