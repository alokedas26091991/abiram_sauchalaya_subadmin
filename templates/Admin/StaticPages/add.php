<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Page <small></small></h2>
                                 </div>
                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                 

                                       <?= $this->Form->create($staticPage,['class'=>'form form-horizontal']); ?>
   
 
    


         <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Page Name') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('page_name', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
          <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Slug') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('slug', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
          <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Description') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('description', ['class'=>'form-control ckeditor','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
          <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Meta Title') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('meta_title', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
          <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Meta Keywords') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('meta_keywords', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
          <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Meta Description') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('meta_desc', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
          <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Robots') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('robots', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
          <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Canonical') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('canonical', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
		
                 
         
                    

 <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
 <?= $this->Form->end() ?>

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
    <?php $this->Html->script(['/admin_template/ckeditor/ckeditor'], ['block' => 'scriptBottom']) ?>            