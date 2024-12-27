 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($slider,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		</br></br></br>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Slider Photo') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('pic',['type'=>'file','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			</br>
			<img src="/slider/<?=$slider->photo?>" height="100" width="200"/>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Image Link') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('image_link',['type'=>'text','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Details') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('caption',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			
		
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sort Order') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->number('sort_order',['type'=>'number','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Status') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('is_active',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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
</section>
</div>
</div>