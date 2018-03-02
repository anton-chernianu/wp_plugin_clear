document.addEventListener('DOMContentLoaded', function(){
	var addImageBtn = document.querySelector('.conci__addimage');
	var inputImgLink = document.querySelector('.conci__imglink');
	var imgThumb = document.querySelector('.conci__img');
	var customUploader = wp.media({
		title: 'Select an Image',
		button: {
			text: 'Select Image'
		},
		multiple: false
	});
	addImageBtn.addEventListener('click', function(){
		if (customUploader)	{
			customUploader.open();
		}	
	});
	customUploader.on('select', function(){
		var selectImageInfo = customUploader.state().get('selection').first().toJSON();
		var imageURL = selectImageInfo.url;
		inputImgLink.value = imageURL;
		imgThumb.style.backgroundImage = 'url('+imageURL+')';
		imgThumb.classList.remove('conci-hide');
	});

});
