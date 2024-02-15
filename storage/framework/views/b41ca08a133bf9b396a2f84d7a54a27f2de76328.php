
<form method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/products/')); ?>" data-parsley-validate class="form-horizontal form-label-left">
<?php echo csrf_field(); ?>
  <div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark"><?php echo e(__('Product Name :')); ?> <span class="text-danger">*</span></label>
            <input required="" placeholder="<?php echo e(__("Please enter product name")); ?>" type="text" id="first-name" name="name" value="<?php echo e(old('name')); ?>" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Select Brand: ')); ?> <span class="text-danger">*</span></label>
          <select placeholder="<?php echo e(__("Please select brand")); ?>" required="" name="brand_id" class="select2 form-control">
            <option value="">
              <?php echo e(__('Please Select')); ?>

            </option>
            <?php if(!empty($brands_products)): ?>
              <?php $__currentLoopData = $brands_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($brand->id); ?>" <?php echo e($brand->id == old('brand_id') ? 'selected="selected"' : ''); ?>>
                <?php echo e($brand->name); ?> </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Category : ')); ?> <span class="text-danger">*</span></label>
            <select data-placeholder="<?php echo e(__("Please select category")); ?>" required="" name="category_id" id="category_id" class="form-control select2">
            <option value=""><?php echo e(__("Please Select")); ?></option>
            <?php if(!empty($categorys)): ?>
              <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected="selected"' : ''); ?>>
                  <?php echo e($category->title); ?> 
                </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </select>
          
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Subcategory : ')); ?> <span class="text-danger">*</span></label>
            <select data-placeholder="<?php echo e(__("Please select subcategory")); ?>" required="" name="child" id="upload_id" class="form-control select2">
             <option value=""><?php echo e(__('Please Select')); ?></option>
        
            </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Childcategory : ')); ?> </label>
          <select data-placeholder="<?php echo e(__("Please select childcategory")); ?>" name="grand_id" id="grand" class="form-control select2">
          <option value="">
            <?php echo e(__('Please choose')); ?>

          </option>
        
          </select>
      </div>
    </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="text-dark"><?php echo e(__('Author : ')); ?> <span class="text-danger">*</span></label>
              <select data-placeholder="<?php echo e(__("Please select Author")); ?>" required="" name="author_id" id="author_id" class="form-control select2">
                  <option value=""><?php echo e(__("Please Select")); ?></option>
                  <?php if(!empty($authors)): ?>
                      <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($author->id); ?>" <?php echo e(old('author_id') == $author->id ? 'selected="selected"' : ''); ?>>
                              <?php echo e($author->title); ?>

                          </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
              </select>

          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="text-dark"><?php echo e(__('Publisher : ')); ?> <span class="text-danger">*</span></label>
              <select data-placeholder="<?php echo e(__("Please select Publisher")); ?>" required="" name="publisher_id" id="publisher_id" class="form-control select2">
                  <option value=""><?php echo e(__("Please Select")); ?></option>
                  <?php if(!empty($publishers)): ?>
                      <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($pub->id); ?>" <?php echo e(old('publisher_id') == $pub->id ? 'selected="selected"' : ''); ?>>
                              <?php echo e($pub->title); ?>

                          </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
              </select>

          </div>
      </div>

    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo e(__("Also in :")); ?></label>
            <select multiple="multiple" name="other_cats[]" id="other_cats" class="form-control select2">
              <?php if(!empty($categorys)): ?>
                <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e(old('other_cats') && in_array($category->id,old('other_cats')) ? "selected" : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </select>

            <small class="text-primary">
                <i class="feather icon-help-circle"></i> <?php echo e(__("If in list primary category is also present then it will auto remove from this after create product.")); ?>

            </small>
        </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Select Store : ')); ?> <span class="text-danger">*</span></label>
          <select data-placeholder="<?php echo e(__("Please select store")); ?>" required="" name="store_id" class="form-control select2">
            <option value=""><?php echo e(__("Please select store")); ?></option>
            <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <optgroup label="Store Owner • <?php echo e($store->owner); ?>">
                <option <?php echo e(old('store_id') == $store->storeid ? "selected" : ""); ?> value="<?php echo e($store->storeid); ?>">
                  <?php echo e($store->storename); ?></option>
              </optgroup>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <small class="txt-desc">(<?php echo e(__("Please Choose Store Name")); ?>)</small>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Upload product catlog : ')); ?> </label>
          <div class="input-group mb-3">
            
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="catlog" id="catlog"/>
                <label class="custom-file-label" for="catlog"><?php echo e(__("Choose file")); ?> </label>
            </div>
          </div>
          <small>(<?php echo e(__("Catlog file max size")); ?>: 1MB ) | <?php echo e(__("Supported files :")); ?> pdf,docs,docx,ppt,txt</small>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Select Size chart : ')); ?> </label>
          <select name="size_chart" class="form-control select2">
              <option value="NULL"><?php echo e(__('None')); ?></option>
              <?php $__currentLoopData = $template_size_chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chartoption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($chartoption->id); ?>"><?php echo e($chartoption->template_name); ?> (<?php echo e($chartoption->template_code); ?>) </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </select>
      </div>
    </div>


    <div class="col-md-12">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Key Features :')); ?> </label>
          <textarea class="form-control" id="editor2" name="key_features"><?php echo old('key_features'); ?></textarea>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Description :')); ?> </label>
          <textarea id="editor1" value="<?php echo e(old('des' ?? '')); ?>" name="des" class="form-control"><?php echo e(old('des' ?? '')); ?></textarea>
          <small class="txt-desc">(<?php echo e(__("Please Enter Product Description")); ?>)</small>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
      <label class="text-dark" for="first-name"><?php echo e(__('Product Video Preview :')); ?> </label>
      <input name="video_preview" value="<?php echo e(old('video_preview')); ?>" type="text" class="form-control" placeholder="eg: https://youtube.com/watch?v=">
      <small class="text-muted">
          • <?php echo e(__("Supported urls are")); ?> : <b>Youtube,vimeo, only.</b>
      </small>
      </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
      <label class="text-dark" for="first-name"><?php echo e(__('Product Video Thumbnail :')); ?></label>
      <div class="input-group mb-3">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="video_thumbnail" id="video_thumbnail"/>
            <label class="custom-file-label" for="video_thumbnail"><?php echo e(__("Choose file")); ?> </label>
        </div>
      </div>
      <small class="text-muted">
          <?php echo e(__("• Max upload size is 500KB.")); ?>

      </small>
    </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Warranty (Duration) : ')); ?> </label>
          <select class="form-control select2" name="w_d" id="">
            <option><?php echo e(__("None")); ?></option>
              <?php for($i=1;$i<=12;$i++): ?> 
                  <option <?php echo e(old('w_d') == $i ? "selected" : ""); ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
              <?php endfor; ?>
          </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Days/Months/Year :')); ?> </label>
          <select class="form-control select2" name="w_my" id="">
            <option><?php echo e(__("None")); ?></option>
            <option <?php echo e(old('w_my') == 'day' ? "selected" : ""); ?> value="day"><?php echo e(__("Day")); ?></option>
            <option <?php echo e(old('w_my') == 'month' ? "selected" : ""); ?> value="month"><?php echo e(__("Month")); ?></option>
            <option <?php echo e(old('w_my') == 'year' ? "selected" : ""); ?> value="year"><?php echo e(__("Year")); ?></option>
          </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Type :')); ?> </label>
          <select class="form-control select2" name="w_type" id="">
            <option>None</option>
            <option <?php echo e(old('w_type') == 'Guarantee' ? "selected" : ""); ?> value="Guarantee">
              <?php echo e(__("Guarantee")); ?>

            </option>
            <option <?php echo e(old('w_type') == 'Warranty' ? "selected" : ""); ?> value="Warranty">
              <?php echo e(__("Warranty")); ?>

            </option>
          </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Start Selling From :')); ?> </label>
          <div class="input-group">                                  
          <input type="text" id="default-date" name="selling_start_at" value="<?php echo e(old('selling_start_at')); ?>" class="datepicker-here form-control" placeholder="dd/mm/yyyy" aria-describedby="basic-addon2"/>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
            </div>
          </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark"><?php echo e(__('Tags :')); ?> </label>
          <input value="<?php echo e(old('tags')); ?>" placeholder="<?php echo e(__("Please enter tag seprated by Comma(,)")); ?>" type="text" name="tags"
        class="form-control">
      </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
      <label class="text-dark"><?php echo e(__('Model :')); ?></label>
      <input type="text" id="first-name" name="model" class="form-control" placeholder="<?php echo e(__("Please Enter Model Number")); ?>" value="<?php echo e(old('model')); ?>">
    </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="text-dark"><?php echo e(__('HSN/SAC :')); ?><span class="text-danger">*</span></label>
        <input required placeholder="<?php echo e(__("Enter product HSN/SAC code")); ?>" type="text" class="form-control" name="hsn" value="<?php echo e(old('hsn')); ?>">
      </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
      <label for="first-name" class="text-dark"><?php echo e(__('SKU :')); ?></label>
      <input type="text" id="first-name" name="sku" value="<?php echo e(old('sku')); ?>" placeholder="Please enter SKU" class="form-control">
    </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
      <label class="text-dark"><?php echo e(__('Price Including Tax ?')); ?></label><br>
      <label class="switch">
        <input <?php echo e(old('tax_r') ? "checked" : ""); ?> type="checkbox" id="tax_manual"
          class="toggle-input toggle-buttons" name="tax_manual">
        <span class="knob"></span>
      </label>
      </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
      <label class="text-dark"><?php echo e(__('Price :')); ?> <span class="text-danger">*</span>
      </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><?php echo e($defCurrency->currency->code); ?></span>
        </div>
        <input pattern="[0-9]+(\.[0-9][0-9]?)?" onchange="commissionvalue()" title="<?php echo e(__("Price Format must be in this format : 200 or 200.25")); ?>" required=""
        type="text" id="price"  name="price" value="<?php echo e(old('price')); ?>" class="form-control">
      </div>
      <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Do not put comma whilt entering PRICE')); ?></small>
      </div>
    </div>

    <!-- <div class="col-md-2">
    <div class="form-group">
      <label class="text-dark"><?php echo e(__('Original Price :')); ?> <span class="text-danger">*</span>
      </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><?php echo e($defCurrency->currency->code); ?></span>
        </div>
        <input pattern="[0-9]+(\.[0-9][0-9]?)?" title="<?php echo e(__("Price Format must be in this format : 200 or 200.25")); ?>" required=""
        type="text" id="original_price" onchange="commissionvalue()" name="original_price" value="<?php echo e(old('original_price')); ?>" class="form-control">
      </div>
      <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Do not put comma whilt entering PRICE')); ?></small>
      </div>
    </div>

    <div class="col-md-2">
    <div class="form-group">
      <label class="text-dark"><?php echo e(__('Commission :')); ?>

      </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><?php echo e($defCurrency->currency->code); ?></span>
        </div>
        <input title="<?php echo e(__("Offer price Format must be in this format : 200 or 200.25")); ?>" disabled pattern="[0-9]+(\.[0-9][0-9]?)?"
        type="text" name="commission" id="commission" class="form-control"
        value="">
      </div>
      <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Do not put comma whilt entering OFFER PRICE')); ?></small>
    </div>
    </div> -->

    <div class="col-md-4">
    <div class="form-group">
      <label class="text-dark"><?php echo e(__('Offer Price :')); ?>

      </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><?php echo e($defCurrency->currency->code); ?></span>
        </div>
        <input title="<?php echo e(__("Offer price Format must be in this format : 200 or 200.25")); ?>" pattern="[0-9]+(\.[0-9][0-9]?)?"
        type="text" name="offer_price" class="form-control"
        value="<?php echo e(old('offer_price')); ?>">
      </div>
      <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Do not put comma whilt entering OFFER PRICE')); ?></small>
    </div>
    </div>
      <div class="col-md-4">
          <div class="form-group">
              <label class="text-dark"><?php echo e(__('Retail Price :')); ?>

              </label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><?php echo e($defCurrency->currency->code); ?></span>
                  </div>
                  <input title="<?php echo e(__("Retail Price Format must be in this format : 200 or 200.25")); ?>" pattern="[0-9]+(\.[0-9][0-9]?)?"
                         type="text" name="retail_price" class="form-control"
                         value="<?php echo e(old('retail_price')); ?>">
              </div>
              <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Do not put comma whilt entering retail_price')); ?></small>
          </div>
      </div>

    <div class="col-md-4">
      <div class="form-group">
        
        <label class="text-dark">
        <?php echo e(__('Gift Packaging Charge :')); ?>

        </label>
    
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><?php echo e($defCurrency->currency->code); ?></span>
          </div>
          <input title="<?php echo e(__("Gift Packaging price Format must be in this format : 200 or 200.25")); ?>" pattern="[0-9]+(\.[0-9][0-9]?)?" type="number" step="0.01" min="0" value="<?php echo e(old('gift_pkg_charge') ?? 0); ?>" name="gift_pkg_charge" class="form-control" value="<?php echo e(old('gift_pkg_charge')); ?>">
          
        </div>
    
      <small class="text-muted"><i class="fa fa-question-circle"></i> 
        <?php echo e(__("PUT 0 if you don't want to enable gift packaging for this product.")); ?>

      </small>
      </div>
    </div>

    <div class="col-md-4 <?php echo e(old('tax_r') !='' ? '' : 'display-none'); ?>" id="manual_tax" >
      
      <label class="text-dark"><?php echo e(__('Tax Applied (In %)')); ?><span class="text-danger">*</span></label>
      <div class="input-group mb-3">
        
        <input id="tax_r" type="number" min="0" placeholder="0" name="tax_r" class="form-control" <?php echo e(old('tax_r') ? "required" : ""); ?> value="<?php echo e(old('tax_r')); ?>">
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">%</span>
        </div>
      </div>
    </div>

    <div class="col-md-4 <?php echo e(old('tax_r') !='' ? '' : 'display-none'); ?>" id="manual_tax_name">
      <div class="form-group">
        <label class="text-dark"><?php echo e(__('Tax Name :')); ?><span class="text-danger">*</span></label>
        <input <?php echo e(old('tax_r') ? "required" : ""); ?> type="text" id="tax_name" class="form-control"
          name="tax_name" title="<?php echo e(__("Tax rate must without % sign")); ?>" placeholder="<?php echo e(__("Enter Tax Name")); ?>"
          value="<?php echo e(old('tax_name')); ?>">
      </div>
    </div>

    <div class="col-md-12">
      <div class="<?php echo e(old('tax_r') ? 'display-none' : ""); ?>" id="tax_class">
        <label class="text-dark">
          Tax Classes:
        </label>
        <select <?php echo e(!old('tax_r') ? "required" : ""); ?> name="tax" id="tax_class_box" class="form-control">
          <option value="">Please Choose..</option>
          <?php $__currentLoopData = App\TaxClass::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($tax->id); ?>"
            <?php if(!empty($products)): ?><?php echo e($tax->id == old('tax') ? 'selected="selected"' : ''); ?><?php endif; ?>><?php echo e($tax->title); ?>

          </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <small class="txt-desc">(<?php echo e(__("Please Choose Yes Then Start Sale This Product.")); ?>)</small>
        <img src="<?php echo e((url('images/info.png'))); ?>" data-toggle="modal" data-target="#taxmodal" class="img-fluid" width="15" ><br>

      </div>
    </div>


    <div class="col-md-4">
      <div class="form-group">
        <label class="text-dark"><?php echo e(__("Product tag")); ?> (<?php echo e(app()->getLocale()); ?>) :
            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__("It will show in front end in rounded circle with product thumbnail")); ?>"></i>
        </label>
        <input type="text" value="<?php echo e(old("sale_tag")); ?>" class="form-control" name="sale_tag" placeholder="Exclusive">
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="text-dark">
              <?php echo e(__("Product tag text color")); ?> :
          </label>
          <div class="input-group initial-color">
            <input type="text" class="form-control input-lg" value="#000000"  name="sale_tag_text_color" placeholder="#000000"/>
            <span class="input-group-append">
            <span class="input-group-text colorpicker-input-addon"><i></i></span>
            </span>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="text-dark">
              <?php echo e(__("Product tag background color")); ?> :
          </label>
          <div class="input-group initial-color" title="Using input value">
            <input type="text" class="form-control input-lg" value="#000000"  name="sale_tag_color" placeholder="#000000"/>
            <span class="input-group-append">
            <span class="input-group-text colorpicker-input-addon"><i></i></span>
            </span>
        </div>
      
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="text-dark"><?php echo e(__("Free Shipping :")); ?></label><br>
        <label class="switch">
          <input class="slider" type="checkbox" name="free_shipping"  <?php echo e(old('free_shipping') ? 'checked' : ''); ?> />
          <span class="knob"></span>
        </label><br>
        <small class="txt-desc">(<?php echo e(__("If Choose Yes Then Free Shipping Start.")); ?>)</small>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="text-dark"><?php echo e(__(" Featured :")); ?></label><br>
        <label class="switch">
          <input class="slider" type="checkbox" name="featured"  <?php echo e(old('featured') ? 'checked' : ""); ?> />
          <span class="knob"></span>
        </label><br>
        <small class="txt-desc">(<?php echo e(__("If enable than Product will be featured")); ?>)</small>
      </div>
    </div>

    <div class="form-group col-md-4">
        <label class="text-dark" for="exampleInputDetails"><?php echo e(__('Status')); ?> </label><br>
        <label class="switch">
          <input class="slider" type="checkbox" name="status"  <?php echo e(old('status') ? 'checked' : ""); ?> />
          <span class="knob"></span>
        </label><br>
        <small><?php echo e(__('(Please Choose Status)')); ?></small>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="text-dark"><?php echo e(__('Cancel Available :')); ?></label><br>
        <label class="switch">
            <input class="slider" type="checkbox" name="cancel_avl"  <?php echo e(old('cancel_avl')  ? 'checked' : ""); ?> />
            <span class="knob"></span>
          </label><br>
        <small><?php echo e(__('(Please Choose Cancel Available )')); ?></small>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="text-dark" for="first-name"><?php echo e(__('Cash On Delivery :')); ?></label><br>
        <label class="switch">
          <input class="slider" type="checkbox" name="codcheck"  <?php echo e(old('codcheck') ? 'checked' : ""); ?> />
          <span class="knob"></span>
        </label><br>
        <small><?php echo e(__('(Please Choose Cash on Delivery Available On This Product or Not)')); ?></small>
      </div>
    </div>

    <div class="last_btn col-md-4">
      <div class="form-group">
        <label class="text-dark" for=""><?php echo e(__("Return Available :")); ?></label>
        <!-- <select required="" class="form-control select2" id="choose_policy" name="return_avbls">
          <option value=""><?php echo e(__("Please choose an option")); ?></option>
          <option <?php echo e(old('return_avbls') =='1' ? "selected" : ""); ?> value="1"><?php echo e(__("Return Available")); ?></option>
          <option <?php echo e(old('return_avbls') =='0' ? "selected" : ""); ?> value="0"><?php echo e(__("Return Not Available")); ?></option>
        </select> -->
        <br>
        <label class="switch" onchange="return_avbls()">
          <input class="slider return_avbls" type="checkbox" name="return_avbls" <?php echo e(old('return_avbls') ? 'checked' : ""); ?> />
          <span class="knob"></span>
        </label>
        <br>
        <small class="text-desc">(<?php echo e(__("Please choose an option that return will be available for this product or not")); ?>)</small>
      </div>
    </div>

    <div id="return_policy" class="form-group col-md-4">
      <label class="text-dark"> <?php echo e(__("Select Return Policy :")); ?> <span class="text-danger">*</span></label>
      <select data-placeholder="<?php echo e(__("Please select return policy")); ?>" name="return_policy" class="form-control choose_policy select2">
          <option value=""><?php echo e(__("Please select return policy")); ?></option>
          <?php $__currentLoopData = App\admin_return_product::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option <?php echo e(old('policy_id') == $policy->id ? "selected" : ""); ?> value="<?php echo e($policy->id); ?>"><?php echo e($policy->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>

    <div class="col-md-12 mt-2">
      <div class="form-group">
        <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> <?php echo e(__("Create")); ?></button>
      </div>
    </div>

  </div>
</form>

<script>
  function commissionvalue(){
    const price = document.getElementById("price").value;
    const original_price = document.getElementById("original_price").value;
    const commission = original_price - price;
    document.getElementById("commission").value = commission;
  }
  $("#return_policy").hide();
  function return_avbls() {
   
    if($(".return_avbls").prop('checked')){
      $("#return_policy").show();
    } else {
      $("#return_policy").hide();
    }
  }


</script><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/product/tab/product.blade.php ENDPATH**/ ?>