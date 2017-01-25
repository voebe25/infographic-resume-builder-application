$(function(){
    var bCanPreview1=true ,bCanPreview2 = true , bCanPreview3=true ,bCanPreview4=true , bCanPreview5=true,bCanPreview5=true,bCanPreview6=true,bCanPreview7=true,bCanPreview8=true,bCanPreview9=true,bCanPreview10=true,bCanPreview11=true,bCanPreview12 = true;

    // create canvas and context objects
    var canvas1 = document.getElementById('picker1');
	var canvas1_2 = document.getElementById('pview1');
	var canvas2 = document.getElementById('picker2');
	var canvas2_2 = document.getElementById('pview2');
	var canvas3 = document.getElementById('picker3');
	var canvas3_2 = document.getElementById('pview3');
	var canvas4 = document.getElementById('picker4');
	var canvas4_2 = document.getElementById('pview4');
	var canvas5 = document.getElementById('picker5');
	var canvas5_2 = document.getElementById('pview5');
	var canvas6 = document.getElementById('picker6');
	var canvas6_2 = document.getElementById('pview6');
	var canvas7 = document.getElementById('picker7');
	var canvas7_2 = document.getElementById('pview7');
	var canvas8 = document.getElementById('picker8');
	var canvas8_2 = document.getElementById('pview8');
	var canvas9 = document.getElementById('picker9');
	var canvas9_2 = document.getElementById('pview9');
	var canvas10 = document.getElementById('picker10');
	var canvas10_2 = document.getElementById('pview10');
	var canvas11 = document.getElementById('picker11');
	var canvas11_2 = document.getElementById('pview11');
	var canvas12 = document.getElementById('picker12');
	var canvas12_2 = document.getElementById('pview12');
	
    var ctx1 = canvas1.getContext('2d');
	var ctx1_2 = canvas1_2.getContext('2d');
	var ctx2 = canvas2.getContext('2d');
	var ctx2_2 = canvas2_2.getContext('2d');
	var ctx3 = canvas3.getContext('2d');
	var ctx3_2 = canvas3_2.getContext('2d');
	var ctx4 = canvas4.getContext('2d');
	var ctx4_2 = canvas4_2.getContext('2d');
	var ctx5 = canvas5.getContext('2d');
	var ctx5_2 = canvas5_2.getContext('2d');
	var ctx6 = canvas6.getContext('2d');
	var ctx6_2 = canvas6_2.getContext('2d');
	var ctx7 = canvas7.getContext('2d');
	var ctx7_2 = canvas7_2.getContext('2d');
	var ctx8 = canvas8.getContext('2d');
	var ctx8_2 = canvas8_2.getContext('2d');
	var ctx9 = canvas9.getContext('2d');
	var ctx9_2 = canvas9_2.getContext('2d');
	var ctx10 = canvas10.getContext('2d');
	var ctx10_2 = canvas10_2.getContext('2d');
	var ctx11 = canvas11.getContext('2d');
	var ctx11_2 = canvas11_2.getContext('2d');
	var ctx12 = canvas12.getContext('2d');
	var ctx12_2 = canvas12_2.getContext('2d');

    // drawing active image
    var image = new Image();
    image.onload = function () {
        ctx1.drawImage(image, 0, 0, image.width, image.height); // draw the image on the canvas
        ctx2.drawImage(image, 0, 0, image.width, image.height);
		ctx3.drawImage(image, 0, 0, image.width, image.height);
	    ctx4.drawImage(image, 0, 0, image.width, image.height);  
		ctx5.drawImage(image, 0, 0, image.width, image.height); 
        ctx6.drawImage(image, 0, 0, image.width, image.height);
		ctx7.drawImage(image, 0, 0, image.width, image.height);
	    ctx8.drawImage(image, 0, 0, image.width, image.height);  
		ctx9.drawImage(image, 0, 0, image.width, image.height); 
        ctx10.drawImage(image, 0, 0, image.width, image.height);
		ctx11.drawImage(image, 0, 0, image.width, image.height);
	    ctx12.drawImage(image, 0, 0, image.width, image.height);  
    }
    // select desired colorwheel
    var imageSrc = 'Picker.png';
 
    image.src = imageSrc;

    $('#picker1').mousemove(function(e) { // mouse move handler
        if (bCanPreview1) {
            // get coordinates of current position
            var canvasOffset = $(canvas1).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx1.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control
			
            $('#rgbVal1').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx1_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx1_2.fillRect(0,0,150,75);

        }
	
    });

	
	 $('#picker2').mousemove(function(e) { // mouse move handler
        if (bCanPreview2) {
            // get coordinates of current position
            var canvasOffset = $(canvas2).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx2.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal2').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx2_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx2_2.fillRect(0,0,150,75);

        }
    });
	
	 $('#picker3').mousemove(function(e) { // mouse move handler
        if (bCanPreview3) {
            // get coordinates of current position
            var canvasOffset = $(canvas3).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx3.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal3').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx3_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx3_2.fillRect(0,0,150,75);

        }
    });
	
	 $('#picker4').mousemove(function(e) { // mouse move handler
        if (bCanPreview4) {
            // get coordinates of current position
            var canvasOffset = $(canvas4).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx4.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal4').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx4_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx4_2.fillRect(0,0,150,75);

        }
    });
	
	 $('#picker5').mousemove(function(e) { // mouse move handler
        if (bCanPreview5) {
            // get coordinates of current position
            var canvasOffset = $(canvas5).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx5.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal5').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx5_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx5_2.fillRect(0,0,150,75);

        }
    });
	 $('#picker6').mousemove(function(e) { // mouse move handler
        if (bCanPreview6) {
            // get coordinates of current position
            var canvasOffset = $(canvas6).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx6.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal6').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx6_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx6_2.fillRect(0,0,150,75);

        }
    });
	 $('#picker7').mousemove(function(e) { // mouse move handler
        if (bCanPreview7) {
            // get coordinates of current position
            var canvasOffset = $(canvas7).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx7.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal7').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx7_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx7_2.fillRect(0,0,150,75);

        }
    });
	 $('#picker8').mousemove(function(e) { // mouse move handler
        if (bCanPreview8) {
            // get coordinates of current position
            var canvasOffset = $(canvas8).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx8.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal8').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx8_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx8_2.fillRect(0,0,150,75);

        }
    });
	 $('#picker9').mousemove(function(e) { // mouse move handler
        if (bCanPreview9) {
            // get coordinates of current position
            var canvasOffset = $(canvas9).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx9.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal9').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx9_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx9_2.fillRect(0,0,150,75);

        }
    });
	 $('#picker10').mousemove(function(e) { // mouse move handler
        if (bCanPreview10) {
            // get coordinates of current position
            var canvasOffset = $(canvas10).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx10.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal10').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx10_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx10_2.fillRect(0,0,150,75);

        }
    });
	 $('#picker11').mousemove(function(e) { // mouse move handler
        if (bCanPreview11) {
            // get coordinates of current position
            var canvasOffset = $(canvas11).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx11.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal11').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx11_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx11_2.fillRect(0,0,150,75);

        }
    });
	 $('#picker12').mousemove(function(e) { // mouse move handler
        if (bCanPreview12) {
            // get coordinates of current position
            var canvasOffset = $(canvas12).offset();
            var canvasX = Math.floor(e.pageX - canvasOffset.left);
            var canvasY = Math.floor(e.pageY - canvasOffset.top);

            // get current pixel
            var imageData = ctx12.getImageData(canvasX, canvasY, 1, 1);
            var pixel = imageData.data;
            // update control 
			
            $('#rgbVal12').val(pixel[0]+','+pixel[1]+','+pixel[2]);
			ctx12_2.fillStyle = "rgb("+pixel[0]+", "+pixel[1]+", "+pixel[2]+")";
            ctx12_2.fillRect(0,0,150,75);

        }
    });
	
    $('#picker1').click(function(e) { // click event handler
        bCanPreview1 = !bCanPreview1;
    }); 
	$('#picker2').click(function(e) { // click event handler
        bCanPreview2 = !bCanPreview2;
    }); 
	$('#picker3').click(function(e) { // click event handler
        bCanPreview3 = !bCanPreview3;
    });
	$('#picker4').click(function(e) { // click event handler
        bCanPreview4 = !bCanPreview4;
    });
  	$('#picker5').click(function(e) { // click event handler
        bCanPreview5 = !bCanPreview5;
    });
		$('#picker6').click(function(e) { // click event handler
        bCanPreview6 = !bCanPreview6;
    });
		$('#picker7').click(function(e) { // click event handler
        bCanPreview7 = !bCanPreview7;
    });
		$('#picker8').click(function(e) { // click event handler
        bCanPreview8 = !bCanPreview8;
    });
		$('#picker9').click(function(e) { // click event handler
        bCanPreview9 = !bCanPreview9;
    });
		$('#picker10').click(function(e) { // click event handler
        bCanPreview10 = !bCanPreview10;
    });
		$('#picker11').click(function(e) { // click event handler
        bCanPreview11 = !bCanPreview11;
    });
		$('#picker12').click(function(e) { // click event handler
        bCanPreview12 = !bCanPreview12;
    });
});
