gsap.registerPlugin(ScrollTrigger);

const heroProduct1 = document.getElementById("hero-product1");
const heroProduct2 = document.getElementById("hero-product2");
const heroProduct3 = document.getElementById("hero-product3");

gsap.from(heroProduct1, {
  duration: 2.5,
  left: "0%",
  transform: "rotate(10deg)",
  opacity: 0,
  ease: "power2.inOut",
});

gsap.from(heroProduct2, {
  duration: 2.5,
  right: "0%",
  transform: "rotate(-10deg)",
  opacity: 0,
  ease: "power2.inOut",
});

gsap.from(heroProduct3, {
  duration: 2.5,
  top: "40%",
  opacity: 0,
  ease: "power2.inOut",
});

const tl = gsap.timeline({
  scrollTrigger: {
      trigger: "body",
      start: "top top",
      end: "bottom bottom",
      scrub: 1,
      markers: false
  }
});

// Define interactive transitions
tl.to(".animated-element", { 
  top: "40%",
  opacity: 1,
  scale: 1.2,
  rotate: -180,
  ease: "power2.out"
}) 
.to(".animated-element", { 
  rotate: 0,
  opacity: 0,
  top: "30%", 
  right: "80%", 
  scale: 1.4,
  duration: 2,
  ease: "power3.inOut"
})
.to(".animated-element", { 
  opacity: 1,
  top: "20%", 
  right: "20%",
  scale: 1,
  rotate: 180,
  duration: 2,
  ease: "elastic.out(1, 0.5)"
})
.to(".animated-element", { 
  top: "85%",
  right: "10%",
  scale: 1.5,
  rotate: 270,
  duration: 2,
  ease: "back.inOut(2)"
})
.to(".animated-element", { 
  top: "50%", 
  right: "80%", 
  scale: 1,
  rotate: 360,
  duration: 2,
  ease: "power2.out"
})
.to(".animated-element", {
  rotate: 480,
  duration: 2,
  ease: "power2.out"
});

const qualityMattersEl1 = document.getElementById("quality-matters-el1");
const aboutSection = document.getElementById("about");

gsap.to(qualityMattersEl1, {
  scrollTrigger: {
    trigger: aboutSection,
    start: "10% 40%"
  },
  duration: 4,
  top: "75%",
  left: "88%",
  ease: "power2.inOut"
});

const rollis1 = document.querySelector("#rollis1");
const rollis2 = document.querySelector("#rollis2");

gsap.to(rollis1, {
  scrollTrigger: {
    trigger: aboutSection,
    start: "top 10%", 
    end: "60% center", 
    scrub: 2,
  },
  top: "40%",
  right: "100%",
  ease: "power2.inOut"
});

gsap.to(rollis2, {
  scrollTrigger: {
    trigger: aboutSection,
    start: "top 10%",  
    end: "60% center", 
    scrub: 2,  
  },
  bottom: "40%",
  left: "100%",
  ease: "power2.inOut"
});

const productCarousal = document.querySelector("#text-bg-section #container");
gsap.to(productCarousal, {
  scrollTrigger: {
    trigger: productCarousal,
    start: "top 10%",
    end: "bottom 20%",
    scrub: 3,
    pin: true,
  },
  x: -1300,
  ease: "power2.inOut",
})

const globalPresenceText = document.querySelector("#global-presence-text");
const targetSection = document.querySelector("#target-section");

gsap.to(globalPresenceText, {
  scrollTrigger: {
      trigger: "#features",
      start: "80% center",
      end: "bottom 40%",
      scrub: 3
  },
  x: -400,
  y: 500,
  scale: 2,
  opacity: 0.8,
  ease: "power2.inOut"
});

const cont = document.querySelector("#worldWideDomination-container");
const videoOverlays = document.querySelectorAll("#videoOverlay div");

gsap.to(videoOverlays[0], {
  scrollTrigger: {
    trigger: cont,
    start: "top 90%",
    end: "35% center",
    scrub: 3,
    onEnter: () => {
      
    },
    onLeave: () => {
      console.log("Left the section!");
    },
  },
  x: "-100%",
  ease: "power2.inOut"
});

gsap.to(videoOverlays[1], {
  scrollTrigger: {
    trigger: cont,
    start: "top 90%",
    end: "35% center",
    scrub: 3,
    onEnter: () => {
      document.querySelector("#worldWideDomination-container video").setAttribute( "autoplay", "true" )
    },
    onEnterBack: () => {
      globalPresenceText.style.display= "block";
    },
    onLeave: () => {
      globalPresenceText.style.display= "none";
    },
  },
  x: "100%",
  ease: "power2.inOut"
});

const centerEl = document.querySelector("#center-el");

gsap.to(centerEl, {
  y: "250vh",
  ease: "none",
  scrollTrigger: {
    trigger: "#roadmap",
    start: "top top",
    end: "bottom bottom",
    scrub: 3
  }
});


// About Section Animations

gsap.to("#chokoChunk", {
  scrollTrigger: {
    trigger: "#about",
    start: "top 25%",
    end: "25% 25%",
    scrub: 3,
  },
  left: "100%",
  ease: "none",
  rotate: -360
});

gsap.to("#toon1", {
  scrollTrigger: {
    trigger: "#about",
    start: "center 20%",
    end: "bottom 40%",
    scrub: 3
  },
  right: "90%",
  ease: "none",
  rotate: 40
});