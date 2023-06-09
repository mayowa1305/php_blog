<?php require 'inc/header.php' ?>


     <section>
          <div class="container">
          <?php if (!empty($post) && is_object($post)): ?>
            <div>
               <h1><?=$post->title?></h1>
               <p class="lead">
                    <i class="fa fa-calendar"></i> <?=$post->createdDate?>
                    <i class="fa fa-user"></i> <?=$post->author?>
               </p>

               
               <br>

               
               <p><?=nl2br(htmlspecialchars($post->body))?></p>
               <br>
               <br>
            </div>
               <?php endif ?>
               <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                         <h4>Social share</h4>

                         <p>
                              <a href="#" target="_blank"><i class="fa fa-facebook"></i></a> &nbsp;&nbsp;&nbsp;

                              <a href="#" target="_blank"><i class="fa fa-twitter"></i></a> &nbsp;&nbsp;&nbsp;

                              <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                         </p>

                         <br>

                    </div>

                    <div class="col-md-8 col-xs-12">
                         <h4>Comments</h4>
                         <?php if (empty($comment)): ?>
                         <p>No comments found.</p>
                         
                         <br>
                         <?php else: ?>
                         <?php foreach ($comment as $oComment): ?>
                         <div>
                              <P><b><?=$oComment->name?></b></P>
                              <p><?=$oComment->comment?></p>
                              <hr class="clear" />
                         </div>
                         <?php endforeach?>
                         <?php endif ?>
                         <h4>Leave a Comment</h4>

                         <form action="" class="form" method="post">

                              <div class="row">
                                   <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                             <label class="control-label">Name</label>

                                             <input type="text" name="name" class="form-control">
                                        </div>
                                   </div>

                              </div>

                              <div class="form-group">
                                   <label class="control-label">Message</label>

                                   <textarea name="comment" class="form-control" rows="10" autocomplete="off"></textarea>
                              </div>

                              <p><input type="submit" name = "submit_comment" value = "Submit"class="section-btn btn btn-primary"/></p>
                         </form>
                    </div>
               </div>
          </div>
     </section>
     

