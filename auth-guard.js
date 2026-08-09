import { initializeApp }
from "https://www.gstatic.com/firebasejs/12.1.0/firebase-app.js";

import {
    getAuth,
    onAuthStateChanged
}
from "https://www.gstatic.com/firebasejs/12.1.0/firebase-auth.js";


const firebaseConfig = {
    apiKey: "AIzaSyAs5uPMjnz801RxS9uYISNnU3IfVjh4tUY",
    authDomain: "mechanical-library-sp.firebaseapp.com",
    projectId: "mechanical-library-sp",
    storageBucket: "mechanical-library-sp.firebasestorage.app",
    messagingSenderId: "593105358258",
    appId: "1:593105358258:web:a0cb1d7a382cc5fd1068ab",
    measurementId: "G-KK5HCBSFX6"
};


const app = initializeApp(firebaseConfig);

const auth = getAuth(app);


onAuthStateChanged(auth, (user) => {

    if (!user) {

        window.location.href = "login.html";

    }

});
