<?php require 'inc/header.php' ?>
     <main>
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Latest Blog posts <small>Lorem ipsum dolor sit amet.</small></h2>
                              </div>
                         </div>
                         <?php if (empty($posts)): ?>
                            <p>There is no blogs</p>
                            <?php if (!empty($_SESSION['is_logged'])): ?>
                            <p><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blog&amp;a=add'" class="bold">Add New Post</button></p>
                            <?php endif ?>
                         <?php else: ?>
                         <?php foreach ($posts as $oPost): ?>
                         <div class="col-md-4 col-sm-4">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="<?= htmlspecialchars($oPost->image) ?>" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                             <span title="Author"><i class="fa fa-user"></i> <?=$oPost->author?></span>
                                             <span title="Date"><i class="fa fa-calendar"></i><?=$oPost->createdDate?></span>
                                             
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="<?=ROOT_URL?>?p=blog&amp;a=post&amp;id=<?=$oPost->id?>"><?=htmlspecialchars($oPost->title)?></a></h3>
                                        <p><?=nl2br(htmlspecialchars(mb_strimwidth($oPost->body, 0, 100, '...')))?></p>
                                   </div>

                                   <div class="courses-info">
                                        <p><a href="<?=ROOT_URL?>?p=blog&amp;a=post&amp;id=<?=$oPost->id?>" class="section-btn btn btn-primary btn-block">Read More</a></p>
                                        <?php require 'inc/control_buttons.php'?>  
                                   </div>
                              </div>
                            

                         </div>
                         <?php endforeach ?>
                              <?php endif?>
                              </div>
                         </div>
                    </div>

               </div>
          </section>
     </main>

     <!-- CONTACT -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post">
                              <div class="section-title">
                                   <h2>Contact us <small>we love conversations. let us talk!</small></h2>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Enter full name" name="name" required>
                    
                                   <input type="email" class="form-control" placeholder="Enter email address" name="email" required>

                                   <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required></textarea>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Send Message">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="<?=ROOT_URL?>static/images/contact-1-600x400.jpg" class="img-responsive" alt="Smiling Two Girls">
                         </div>
                    </div>

               </div>
          </div>
     </section>       

     <!-- FOOTER -->  
  <?php require 'inc/footer.php' ?>   


