<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Announcement> $announcements
 */
use Cake\ORM\TableRegistry;
?>
<div class="announcement_slider">
    <div class="announcement_container">
        <h1>Announcements</h1>
        <div class="slider">
            <div class="slide-row" id="slide-row">
                <?php foreach ($announcements as $announcement): ?>
                    <div class="slide-col">
                        <div class="content">
            <p> <?= h($announcement->content) ?></p>
            <p><strong class="slide_icon"><i class="fa fa-th-large" aria-hidden="true"></i>
</strong> <?= h($announcement->announcement_category->category_name ?? '-') ?></p>
          <p> <strong class="slide_icon"><i class="fa fa-users" aria-hidden="true"></i>
</strong>
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
            ?><p>
            
                       <p> <strong class="slide_icon"><i class="fa fa-calendar" aria-hidden="true"></i>
</strong> <?= h($announcement->created_at?->format('d M Y')) ?></p>

                                    <h2><?= h($announcement->announcement_name ?? 'No Title') ?></h2>


                        </div>
                        <div class="hero">
                            <?php if (!empty($announcement->image_file)): ?>
            <img src="<?= $this->Url->image($announcement->image_file) ?>" alt="Announcement">
          <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="indicator">
            <?php foreach ($announcements as $index => $announcement): ?>
                <span class="btn <?= $index === 0 ? 'active' : '' ?>"></span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
const btns = document.querySelectorAll(".btn");
const slideRow = document.getElementById("slide-row");
// const slideCols = document.querySelectorAll(".slide-col");

let currentIndex = 0;

function updateSlide() {
    const containerWidth = document.querySelector(".announcement_container").offsetWidth;
    slideRow.style.transform = `translateX(-${currentIndex * containerWidth}px)`;

    btns.forEach((btn, index) => {
        btn.classList.toggle("active", index === currentIndex);
    });
}

btns.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        currentIndex = index;
        updateSlide();
    });
});

window.addEventListener("resize", updateSlide);

// Ensure correct width on load
window.addEventListener("load", () => {
    const containerWidth = document.querySelector(".announcement_container").offsetWidth;
    slideRow.style.width = `${slideCols.length * containerWidth}px`;
    slideCols.forEach(col => {
        col.style.width = `${containerWidth}px`;
    });
    updateSlide();
});
</script>

<style>
.announcement_slider {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: radial-gradient(at 40% 20%, rgb(255, 184, 122), transparent 50%), radial-gradient(at 80% 0%, rgb(31, 221, 255), transparent 50%), radial-gradient(at 0% 50%, rgb(255, 219, 222), transparent 50%), radial-gradient(at 80% 50%, rgb(255, 133, 173), transparent 50%), radial-gradient(at 0% 100%, rgb(255, 181, 138), transparent 50%), radial-gradient(at 80% 100%, rgb(107, 102, 255), transparent 50%), radial-gradient(at 0% 0%, rgb(255, 133, 167), transparent 50%);
    background-repeat: no-repeat;
    background-size: cover;
}
.slide-col{
    width:100%;
}
.announcement_container {
    width: 90%;
    max-width: 800px;
    overflow: hidden;
    position: relative;
    padding:30px 0;
}
.announcement_container h1{
    font-size:40px;
    text-align:center;
    font-weight:bold;
    margin-bottom:40px;
    color:#fff;
}
.content h2 {
    font-size: 20px;
    font-weight: 600;
    margin-top: 35px;
    color: #4d4352;
}
.content p {
    font-size: 18px;
    font-weight: 400;
    line-height: 1.3;
    margin-bottom:15px;
}
.slider {
    width: 100%;
    overflow: hidden;
}

.slide-row {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide-col {
    flex-shrink: 0;
    height: 400px;
    position: relative;
}

.hero {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
}

.hero img {
    height: 100%;
    width: 300px;
    object-fit: cover;
    border-radius: 10px;
    pointer-events: none;
    user-select: none;
}

.content {
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    /* width: 540px; */
    width:calc(100% - 230px);
    height: auto;
    color: #4d4352;
    background: rgba(255, 255, 255, 0.7);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(4.5px);
    -webkit-backdrop-filter: blur(4.5px);
    border-radius: 10px;
    padding: 45px;
    z-index: 2;
    user-select: none;
}


.indicator {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

.indicator .btn {
    display: inline-block;
    height: 15px;
    width: 15px;
    margin: 4px;
    border-radius: 15px;
    background: #fff;
    cursor: pointer;
    transition: all
}
.btn.active {
    width: 30px;
}
.slide_icon{
    width: 30px;
    height: 30px;
    display: inline-block;
    background: transparent;
    box-shadow:0 4px 30px rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}
.slide_icon i {
    font-size: 14px;
}

@media(max-width:991px){
    .content{
    width:400px;
    padding:40px 20px;
    }
}
@media(max-width:767px){
    .hero img{
        height:auto;
        width:200px;
    }
    .content p{
        font-size:16px;
    }
    .content{
        padding:20px;
    }
}

@media(max-width:575px){
    .hero {
    top: 60%;
    height: 100px;
    z-index: 5;
}
.hero img {
    width: 100px;
}
}