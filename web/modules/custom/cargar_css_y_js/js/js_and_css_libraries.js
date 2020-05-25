(function ($, Drupal) {
  Drupal.behaviors.jsandcss = {
    attach: function (context, settings) {
      console.log(context);

      let headers = document.querySelectorAll(
        ".dropdown-container header"
      );

      headers.forEach(function (header) {
        header.addEventListener("click", openAccordion);
      });

      function openAccordion(e) {
        let parent = this.parentElement;
        let article = this.nextElementSibling;

        if (!parent.classList.contains("open")) {
          parent.classList.add("open");
          article.style.maxHeight = article.scrollHeight + "px";
        } else {
          parent.classList.remove("open");
          article.style.maxHeight = "0px";
        }
      }

      function openCurrAccordion(e) {
        headers.forEach(function (header) {
          let parent = header.parentElement;
          let article = header.nextElementSibling;

          if (this === header && !parent.classList.contains("open")) {
            parent.classList.add("open");
            article.style.maxHeight = article.scrollHeight + "px";
          } else {
            parent.classList.remove("open");
            article.style.maxHeight = "0px";
          }
        });
      }
    },
  };
})(jQuery, Drupal);
