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

    btn.disabled = true;
    btn.style.visibility = 'hidden';

    const titleEl = card.querySelector('h4');
    const fileName = titleEl
        ? titleEl.innerText.trim().replace(/\s+/g, '_')
        : 'word-card';

    // 🔹 Clone the card
    const clone = card.cloneNode(true);

    clone.style.position = "absolute";
    clone.style.left = "-9999px";
    clone.style.top = "0";
    clone.style.margin = "0";
    clone.style.background = "#ffffff";
    clone.style.h4 = "1.35rem";
    clone.style.h2 = "1.8rem";

    // ✅ Mobile-like aspect ratio (portrait)
    clone.style.aspectRatio = "9 / 16";  // 🔹 change here for mobile flashcard
    clone.style.width = "400px";          // optional: fixed width for mobile
    clone.style.height = "350px";          // height adjusts automatically

    document.body.appendChild(clone);

    html2canvas(clone, {
        scale: 3, // high resolution
        backgroundColor: "#ffffff",
        useCORS: true
    }).then(canvas => {
        const link = document.createElement("a");
        link.href = canvas.toDataURL("image/png");
        link.download = fileName + ".png";
        link.click();
    }).finally(() => {
        document.body.removeChild(clone);
        btn.style.visibility = 'visible';
        btn.disabled = false;
    });
}




