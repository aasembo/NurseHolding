<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Announcement> $announcements
 */
use Cake\ORM\TableRegistry;
?>

<?= $this->Html->css('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css') ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js') ?>
<div class="announcement_slider">
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php foreach ($announcements as $announcement): 
            //debug($announcement);
        ?>
      <div class="swiper-slide">
        <div class="announcement-card">
          <?php if (!empty($announcement->image_file)): ?>
            <img src="<?= $this->Url->image($announcement->image_file) ?>" alt="Announcement" style="width: 100%; height: 200px; object-fit: cover;">
          <?php endif; ?>

          <div class="content">
            <h3><?= h($announcement->announcement_name ?? 'No Title') ?></h3>

            <p><strong>Content:</strong> <?= h($announcement->content) ?></p>
            <p><strong>Category:</strong> <?= h($announcement->announcement_category->category_name ?? '-') ?></p>
           <p><strong>Audience:</strong>
            <?php
                if ($announcement->audience_type === 'all') {
                    echo 'All Users';
                } elseif ($announcement->audience_type === 'department') {
                    // echo 'Department: ' . h($announcement->department ?? '-');
                    echo h($announcement->department ?? '-');
                } elseif ($announcement->audience_type === 'individual' &&
                            !empty($announcement->department) &&
                            !empty($announcement->department_ids)
                        ) {
                            try {
                                $department = $announcement->department; // e.g., 'nurses'
                                $tableName = ucfirst($department);       // e.g., 'Nurses'
                                $userTable = TableRegistry::getTableLocator()->get($tableName);

                                $ids = is_array($announcement->department_ids)
                                    ? $announcement->department_ids
                                    : explode(',', $announcement->department_ids);

                                $users = $userTable->find()
                                    ->where(['id IN' => $ids])
                                    ->all();

                                if ($users->isEmpty()) {
                                    echo 'User #' . h($announcement->department_ids);
                                } else {
                                    $names = [];
                                    foreach ($users as $user) {
                                        //debug($user);
                                        if($department == 'nurses'){
                                            $names[] = h($user->LastName ?? ('User #' . $user->LastName));
                                        }else{
                                            $names[] = h($user->name ?? ('User #' . $user->name));
                                        }
                                    }
                                    echo implode(', ', $names);
                                }
                            } catch (\Exception $e) {
                                echo 'User #' . h($announcement->department_ids);
                            }
                        } else {
                    echo '-';
                }
            ?>
            </p>


            <p><strong>Date:</strong> <?= h($announcement->created_at?->format('d M Y')) ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination"></div>
</div>
            </div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.mySwiper', {
        loop: true,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        slidesPerView: 1 // ✅ Only one slide visible at a time
    });
});
</script>


<style>
    .announcement_slider {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background-image: radial-gradient(at 40% 20%, rgb(255, 184, 122) 0px, transparent 50%), radial-gradient(at 80% 0%, rgb(31, 221, 255) 0px, transparent 50%), radial-gradient(at 0% 50%, rgb(255, 219, 222) 0px, transparent 50%), radial-gradient(at 80% 50%, rgb(255, 133, 173) 0px, transparent 50%), radial-gradient(at 0% 100%, rgb(255, 181, 138) 0px, transparent 50%), radial-gradient(at 80% 100%, rgb(107, 102, 255) 0px, transparent 50%), radial-gradient(at 0% 0%, rgb(255, 133, 167) 0px, transparent 50%);
    background-repeat: no-repeat;
}
.announcement-card {
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
    padding: 10px;
    background: #fff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.announcement-card .content {
    padding: 10px 0;
    font-size: 14px;
}
.announcement-card h3 {
    font-size: 18px;
    margin-bottom: 10px;
}
</style>
