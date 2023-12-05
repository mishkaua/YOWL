<script setup>
//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "block"; //change to "none"
  }
}
// When the user clicks on the button, scroll to the top of the document

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<template>
<button

        @click="backToTop"
        type="button"
        class="btn dark btn-floating btn-lg"
        id="btn-back-to-top"
        >
        Back to top
    <font-awesome-icon icon="fa-solid fa-arrow-up" class="fa-xl" />
</button>

</template>