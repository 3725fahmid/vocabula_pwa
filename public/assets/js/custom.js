// $(document).ready(function (){
//     $('#select-all').click(function (){
//         if(this.checked){
//             $(':checkbox').each(function (){
//                 this.checked = true;
//             });
//         }else {
//             $(':checkbox').each(function (){
//                 this.checked = false;
//             });
//         }
//     });

//     $('#user_image').change(function(e){
//         var reader = new FileReader();
//         reader.onload = function(e){
//             $('#showUserImage').attr('src',e.target.result);
//         }
//         reader.readAsDataURL(e.target.files['0']);
//     });

//     $('#cat_banner_img').change(function(e){
//         var reader = new FileReader();
//         reader.onload = function(e){
//             $('#show_cat_bnner_img').attr('src',e.target.result);
//         }
//         reader.readAsDataURL(e.target.files['0']);
//     });

//     $('#page_banner').change(function(e){
//         var reader = new FileReader();
//         reader.onload = function(e){
//             $('#show_page_banner').attr('src',e.target.result);
//         }
//         reader.readAsDataURL(e.target.files['0']);
//     });
// });

// textarea issues solved 
// tinymce.init({
//     selector: '#elm1',
//     setup: function (editor) {
//         editor.on('change', function () {
//             tinymce.triggerSave();
//         });
//     },
// });

// $(document).ready(function() {
//     $('.select2').select2();
// });



// Card download btn function 

function downloadSingleCard(btn) {
    const card = btn.closest('.export-card');
    if (!card) return;

    // Prevent double click
    btn.disabled = true;

    // Get word for filename
    const titleEl = card.querySelector('h4');
    const fileName = titleEl
        ? titleEl.innerText.trim().replace(/\s+/g, '_')
        : 'word-card';

    // Hide button
    btn.style.visibility = 'hidden';

    html2canvas(card, {
        scale: window.devicePixelRatio * 2,
        backgroundColor: '#ffffff',
        useCORS: true
    }).then(canvas => {
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/jpeg', 0.95);
        link.download = fileName + '.jpg';
        link.click();
    }).finally(() => {
        btn.style.visibility = 'visible';
        btn.disabled = false;
    });
}

