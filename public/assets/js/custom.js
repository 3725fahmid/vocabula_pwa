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

    // 🔹 Position off-screen for canvas
    clone.style.position = "absolute";
    clone.style.left = "-9999px";
    clone.style.top = "0";
    clone.style.margin = "0";

    // 🔹 Premium mobile card styles
    clone.style.aspectRatio = "9 / 16";         // portrait mobile style
    clone.style.width = "400px";                // mobile card width
    clone.style.height = "350px";
    clone.style.padding = "20px";               // nice padding
    clone.style.borderRadius = "20px";          // smooth rounded corners
    clone.style.boxShadow = "0 10px 30px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.07)"; // subtle shadow               // dark text for readability


    document.body.appendChild(clone);

    html2canvas(clone, {
        scale: 3, // high resolution
        backgroundColor: null, // keep gradient visible
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





