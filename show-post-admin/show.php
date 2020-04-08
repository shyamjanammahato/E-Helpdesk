<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$post_sl=base64_decode(base64_decode($_REQUEST['post_sl']));
?>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nested comments</title>
    <style>

     .post-comments {
         padding-bottom: 9px;
         margin: 5px 0 5px;
     }

     .comments-nav {
         border-bottom: 1px solid #eee;
         margin-bottom: 5px;
     }

     .post-comments .comment-meta {
         border-bottom: 1px solid #eee;
         margin-bottom: 5px;
     }

     .post-comments .media {
         border-left: 1px dotted #000;
         border-bottom: 1px dotted #000;
         margin-bottom: 5px;
         padding-left: 10px;
     }

     .post-comments .media-heading {
         font-size: 12px;
         color: grey;
     }

     .post-comments .comment-meta a {
         font-size: 12px;
         color: grey;
         font-weight: bolder;
         margin-right: 5px;
     }
    </style>
    <!-- <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous">
    </script> -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">$('[data-toggle="collapse"]').on('click', function() {
         var $this = $(this),
             $parent = typeof $this.data('parent')!== 'undefined' ? $($this.data('parent')) : undefined;
         if($parent === undefined) {
             $this.find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
             return true;
         }

         /* Open element will be close if parent !== undefined */
         var currentIcon = $this.find('.glyphicon');
         currentIcon.toggleClass('glyphicon-plus glyphicon-minus');
         $parent.find('.glyphicon').not(currentIcon).removeClass('glyphicon-minus').addClass('glyphicon-plus');

     });
    </script>
    <script>
    function show_q_image(post_sl)
    {
        $('#light_box1').load('show-question.php?post_sl='+post_sl).fadeIn("fast");
        $('#lightbox_model1').modal('show');
    }
    function del_comment(comment_sl)
    {
        $('#light_box1').load('confirm-del-comment.php?comment_sl='+comment_sl).fadeIn("fast");
        $('#lightbox_model1').modal('show');
    }
    function confirm_del(post_sl)
    {
        $('#light_box1').load('confirm-del-post.php?post_sl='+post_sl).fadeIn("fast");
        $('#lightbox_model1').modal('show');
    }
    // function like_comment(comment_sl,post_sl)
    // {
    //     $('#auto_load').html("<strong>Loading...</strong>").fadeIn("fast");
    //     setTimeout(function(){
    //     $('#auto_load').load('like-comment.php?comment_sl='+comment_sl+'&post_sl='+post_sl).fadeIn("fast");
    //   }, 1);
    // }  
    </script>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Post Details
                </div>
                <div class="panel-body">
                    <form class="" role="form" id="post_reply_frm" name="post_reply_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <?php
                        $query=mysqli_query($conn,"SELECT * FROM post_question where sl='$post_sl' and p_stat='0' ");
                        if($row=mysqli_fetch_array($query))
                        {
                            $subject_id=$row['p_sub'];
                            $subject_other=$row['p_sub_others'];
                            $file=$row['file'];
                            $sl=$row['sl'];
                            $asked_by_id=$row['u_id'];
                            $question=base64_decode($row['post_question']);
                        }
                        $get_name=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$asked_by_id' ");
                        if($row_name=mysqli_fetch_array($get_name))
                        {
                            $asked_by_name=$row_name['full_nm'];
                        }
                    ?>
                        <input type="hidden" name="post_sl" id="post_sl" value="<?php echo $post_sl;?>">
                        <div class="col-lg-12"><div class="form-group">Asked By: <?php echo $asked_by_name;?></div></div>
                        <div class="col-lg-12">
                            <div class="form-group" id="sub_load">
                                <label>Question/Subject <font style="color:red">*</font></label>
                                <textarea class="form-control" rows="4" readonly><?php echo $question;?></textarea>
                            </div>
                        </div>
                    <?php
                        if($file!='null')
                        {
                    ?>
                        <div class="col-lg-12">
                            <div class="form-group" onclick="show_q_image('<?php echo base64_encode(base64_encode($post_sl));?>')">
                                <label>Question Photo <font style="color:red">*</font></label><br>
                                <input type="text" class="form-control" value="<?php echo basename($file);?>" placeholder="Click to See the Question" readonly>
                            </div>
                        </div>
                    <?php
                        }
                        $get_mod1=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' and stat='1' ");
                        if($row_mod1=mysqli_fetch_array($get_mod1))
                        {
                            $uniq_id=$row_mod1['u_id'];
                        }
                        $get_mod=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$uniq_id' and stat='1' ");
                        if($row_mod=mysqli_fetch_array($get_mod))
                        {
                            $user_type=$row_mod['user_type'];
                            if($user_type=='2' || $user_type=='3')
                            {
                        ?>
                            <div class="col-lg-12">
                                <div class="form-group" id="sub_load">
                                    <label>Reply <font style="color:red">*</font></label>
                                    <textarea class="form-control" rows="4" id="reply" name="reply"></textarea>
                                </div>
                            </div>
                        <?php
                            }
                            else
                            {
                        ?>
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: right;">
                                <button type="button" class="btn btn-primary btn-lg btn-block" onclick="confirm_del('<?php echo base64_encode(base64_encode($sl));?>');">Delete this Post</button>
                                </div>
                            </div>
                        <?php
                            }
                        }
                            if($user_type=='2' || $user_type=='3')
                            {
                        ?>
                        <div class="col-lg-12">
                            <div class="form-group" style="text-align: right;">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="button" class="btn btn-primary" name="post_reply" id="post_reply">Comment</button>
                            </div>
                        </div>
                        <?php }?>
                    </form>
                </div>
                <div class="panel-footer">
                    <div id="error_id"></div>
                </div>  
            </div>
        </div>
    </div>
    <div col-lg-12>
        <div class="post-comments">
            <div class="comments-nav"></div>
            <div class="row">
                <div class="media">
                    <!-- first comment -->
                    <?php
                        $c=0;
                        $query_reply=mysqli_query($conn,"SELECT * FROM post_question where lvl='2' and parent='$sl' and p_stat='0' ");
                        while($row_reply=mysqli_fetch_array($query_reply))
                        {   
                            $c++;
                            $u_id=$row_reply['u_id'];
                            $p_dt=$row_reply['p_dt'];
                            $p_time=$row_reply['p_time'];
                            $sl_reply=$row_reply['sl'];
                            $reply=base64_decode($row_reply['post_question']);

                            $get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$u_id' ");
                            if($row_query=mysqli_fetch_array($get_query))
                            {
                                $name=$row_query['full_nm'];
                            }
                    ?>
                    <div class="media-heading">
                        <span class="label label-info"><?php echo $name;?></span> <?php echo date("d, M'y", strtotime($p_dt));?> 
                    </div>
                    <div class="panel-collapse collapse in" id="one">
                        <div class="media-left">
                            <div class="vote-wrap">
                                <div class="save-post">
                                    <a href="javascript:void(0)"><span class="glyphicon glyphicon-star" aria-label="Save"></span></a>
                                </div>
                                <div class="vote up">
                                    <i class="glyphicon glyphicon-menu-up"></i>
                                </div>
                                <div class="vote inactive">
                                    <i class="glyphicon glyphicon-menu-down"></i>
                                </div>
                            </div>
                            <!-- vote-wrap -->
                        </div>
                        <!-- media-left -->

                        <div class="media-body">
                            <p><?php echo $reply;?></p>
                            <div class="comment-meta">
                                <!-- <span><a href="javascript:void(0)" onclick="like_comment('<?php echo base64_encode(base64_encode(base64_encode($sl_reply)));?>','<?php echo base64_encode(base64_encode($post_sl));?>')">Like</a></span> -->
                            <?php
                                $get_mod1=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' and stat='1' ");
                                if($row_mod1=mysqli_fetch_array($get_mod1))
                                {
                                    $uniq_id=$row_mod1['u_id'];
                                }
                                $get_mod=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$uniq_id' and stat='1' ");
                                if($row_mod=mysqli_fetch_array($get_mod))
                                {
                                    $user_type=$row_mod['user_type'];
                                }
                                if($u_id==$id1 || $user_type=='0' || $user_type=='1')
                                {
                            ?>
                                <span><a href="javascript:void(0)" onclick="del_comment('<?php echo base64_encode(base64_encode(base64_encode($sl_reply)));?>')">Delete</a></span>
                            <?php
                                }
                            ?>
                                <span>
                                <?php
                                if($u_id!=$id1 && $user_type!='0' && $user_type!='1')
                                {
                                ?>
                                    <a class="" id="append" role="button" data-toggle="collapse" href="#<?php echo $c;?>" aria-expanded="false" aria-controls="collapseExample">Reply</a>
                                <?php
                                }
                                ?>
                                </span>
                                <!-- <span id="auto_load"></span> -->
                                <div class="collapse" id="<?php echo $c;?>" >
                                    <form class="" role="form" id="reply_reply_frm" name="reply_reply_frm" method="POST" action="add-reply-code/reply-to-reply-code.php">
                                        <input type="hidden" name="reply_sl" id="reply_sl" value="<?php echo $sl_reply;?>">
                                        <input type="hidden" name="post_sl" id="post_sl" value="<?php echo $post_sl;?>">
                                        <div class="form-group">
                                            <label for="comment">Your Comment</label>
                                            <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" name="reply_reply_submit" id="reply_reply_submit" class="btn btn-default">Post</button>
                                        <div id="error_id1"></div>
                                    </form>
                                </div>
                            </div>
                            <!-- comment-meta -->
                        </div>
                        <!-- comments -->
                    </div>
                    <?php 
                $query_reply2=mysqli_query($conn,"SELECT * FROM post_question where lvl='3' and parent='$sl_reply' and p_stat='0' ");
                if($row_reply2=mysqli_fetch_array($query_reply2))
                {
            ?>
                <!-- first comment -->
                <div class="media">
                    <!-- answer to the first comment -->
                       <?php
                        $query_reply1=mysqli_query($conn,"SELECT * FROM post_question where lvl='3' and parent='$sl_reply' and p_stat='0' ");
                        while($row_reply1=mysqli_fetch_array($query_reply1))
                        {   
                            $u_id1=$row_reply1['u_id'];
                            $p_dt1=$row_reply1['p_dt'];
                            $p_time1=$row_reply1['p_time'];
                            $reply1=base64_decode($row_reply1['post_question']);
                            $comment_sl=$row_reply1['sl'];

                            $get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$u_id1' ");
                            if($row_query=mysqli_fetch_array($get_query))
                            {
                                $name1=$row_query['full_nm'];
                            }
                    ?>
                    <div class="media-heading">
                     <span class="label label-info"><?php echo $name1;?></span> <?php echo date("d, M'y", strtotime($p_dt1));?>         
                    </div>
                    <div class="panel-collapse collapse in" id="two">
                        <div class="media-left">
                            <div class="vote-wrap">
                                <div class="save-post">
                                    <a href="#"><span class="glyphicon glyphicon-star" aria-label="Save"></span></a>
                                </div>
                                <div class="vote up">
                                    <i class="glyphicon glyphicon-menu-up"></i>
                                </div>
                                <div class="vote inactive">
                                    <i class="glyphicon glyphicon-menu-down"></i>
                                </div>
                            </div>
                            <!-- vote-wrap -->
                        </div>
                        <!-- media-left -->
                        <div class="media-body">
                            <p><?php echo $reply1;?></p>
                            <div class="comment-meta">
                            <!-- <span><a href="javascript:void(0)" onclick="like_sub_comment('<?php echo base64_encode(base64_encode(base64_encode($comment_sl)));?>','<?php echo base64_encode(base64_encode($post_sl));?>')">Like</a></span> -->
                            <?php
                                $get_mod1=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' and stat='1' ");
                                if($row_mod1=mysqli_fetch_array($get_mod1))
                                {
                                    $uniq_id=$row_mod1['u_id'];
                                }
                                $get_mod=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$uniq_id' and stat='1' ");
                                if($row_mod=mysqli_fetch_array($get_mod))
                                {
                                    $user_type=$row_mod['user_type'];
                                }
                                if($u_id1==$id1 || $user_type=='0' || $user_type=='1')
                                {
                            ?>
                                <span><a href="javascript:void(0)" onclick="del_comment('<?php echo base64_encode(base64_encode(base64_encode($comment_sl)));?>')">Delete</a></span>
                            <?php
                                }
                            ?>
                               <!-- <span id="auto_load1"><i class="fa fa-thumbs-up fa-fw" style="color:#FF5733"></a></span> -->
                            </div>
                            <!-- comment-meta -->
                        </div>
                    </div>
                    <!-- comments -->
                    <?php } ?>
                </div>
                <!-- answer to the first comment -->
                <?php } } ?>
            </div>
        </div>
        <!-- post-comments -->
    </div>
</div>
<div id="lightbox_model1" class="modal fade" role="dialog">
    <div id="light_box1">

    </div>
</div>
<script src="add-reply-js/add-reply.js"></script>
</body></html>
