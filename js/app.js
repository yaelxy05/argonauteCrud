console.log('%c' + "Fichier app.js chargé", 'color: #0bf; font-size: 1rem; background-color:#fff');

const app = {
    messageAdd:null,
    init: function() {
        console.log('%c' + 'Initialisation de app', 'color: #0bf; font-size: 1rem; background-color:#fff');
        app.messageAdd = document.querySelector('.argonaute_response--valid');
        console.log(app.messageAdd);
        
        setTimeout(() =>{
            app.messageAdd.remove();
        },3000);
        clearTimeout();
        
    }
};

// Loading of dom
document.addEventListener('DOMContentLoaded', function() {
    console.log('Dom loaded');
    // once the loading dom, we launch the app
    app.init();
  });
