const navbarTransition = () => {
  const navbar = document.querySelector("#main-nav");
  if (window.scrollY < 100) {
    navbar.style.boxShadow = "none";
  } else if (window.scrollY >= 100) {
    navbar.style.boxShadow = "0 2px 4px -1px rgba(0, 0, 0, 0.25)";
  }
};

class TypeWriter {
  constructor() {
    this.textData = ["digital agency!"];
    this.currentText = "";
    this.word = "";
    this.count = 0;
    this.index = 0;
    this.speed = 500;
    this.isDeleting = false;
    this.type();
  }

  type() {
    if (this.count >= this.textData.length) {
      this.count = 0;
    }

    this.currentText = this.textData[this.count];

    if (this.isDeleting) {
      this.word = this.currentText.slice(0, --this.index);
    } else {
      this.word = this.currentText.slice(0, ++this.index);
    }

    if (this.isDeleting) {
      this.speed = 150;
    }

    if (!this.isDeleting && this.word === this.currentText) {
      this.speed = 600;
      this.isDeleting = true;
    } else if (this.isDeleting && this.word === "") {
      this.isDeleting = false;
      this.count++;
      this.speed = 300;
    }

    const typewriter = document.querySelector(".typewriter");
    typewriter.innerHTML = this.word;

    setTimeout(() => this.type(), this.speed);
  }
}

const init = () => {
  new TypeWriter();
};

window.onscroll = navbarTransition;
document.addEventListener("DOMContentLoaded", init());
