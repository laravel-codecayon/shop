 <?php

 class SimpleImage {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
 
   static function resizewidth($width, $imageold, $imagenew) {

      $image_info = getimagesize($imageold);
      $image_type = $image_info[2];
      if( $image_type == IMAGETYPE_JPEG ) {
 
         $image = imagecreatefromjpeg($imageold);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $image = imagecreatefromgif($imageold);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $image = imagecreatefrompng($imageold);
      }

      $ratio = imagesy($image) / imagesx($image);
      $height = $width * $ratio;

      //$width = imagesx($image) * $width/100;
     // $height = imagesx($image) * $width/100;

      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $image, 0, 0, 0, 0, $width, $height, $image_info[0], $image_info[1]);
      $image = $new_image;

      $compression=75; 
      $permissions=null;

      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($image,$imagenew,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($image,$imagenew);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($image,$imagenew);
      }
      if( $permissions != null) {
 
         chmod($imagenew,$permissions);
      }
      
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
 
}
?> 