<?php 
  // Set default values if not already defined
  if (!isset($headerfixed)) {
    $headerfixed = ''; // Set your desired default value
  }
  if (!isset($headerioverlap)) {
    $headerioverlap = ''; // Set your desired default value
  }
?>
<div id="wrapper">
  <div class="wrap-outer">
    <div class="wrap-inner">
      <?php if(isset($header_img) && $header_img != ''){ ?>
        <header id="header" class="<?php echo $headerfixed; ?> <?php echo $headerioverlap; ?>">
          <div class="outer">
            <div class="inner">
              <img src="<?php echo $header_img; ?>" alt="Header Image">
            </div>
          </div>
        </header>
      <?php } ?>

      <?php if(isset($stickynav_img) && $stickynav_img != 'images/'){ ?>
        <div class="stickynav"><img src="<?php echo $stickynav_img; ?>" alt="sticky Nav Image"></div>
      <?php } ?>

      <?php if (!empty($sticky_img)) { ?>
        <div class="sticky-btn"><img src="<?php echo $sticky_img; ?>" alt="Header Image"></div>
      <?php } else { ?>
        <div class="sticky-btn"><img src="path/to/default/image.jpg" alt="Default Header Image"></div>
      <?php } ?>
    </div>
  </div>
</div>
