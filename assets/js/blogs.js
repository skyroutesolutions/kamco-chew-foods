// Schema toggle via URL
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const getSchema = urlParams.get("schema");
if (getSchema === "dark") {
  setDarkMode(1);
} else if (getSchema === "light") {
  setDarkMode(0);
}

const blogs = [
  {
    id: 1,
    image: "https://blog.ansi.org/wp-content/uploads/2017/03/Cocoa.jpg",
    title: "Demand of Chocolate",
    description:
      "The consumption of chocolate is far from an emerging trend. In fact, the cultivation of cocoa beans dates back to the Mayans.",
  },
  {
    id: 2,
    image:
      "https://images.squarespace-cdn.com/content/v1/613a355a1825c65d1f0a6a8a/0caad36a-b5cd-4f5d-8dee-c0e43c0d5d5e/Finding+Fine+Chocolate.jpg?format=2500w",
    title: "Finding Fine Chocolate",
    description:
      "Barbie Van Horn’s blog consists mostly of reviews of chocolate, but also experiences. Van Horn is one of the founders of the Pacific NW Chocolate Society.",
  },
  {
    id: 2,
    image:
      "https://images.squarespace-cdn.com/content/v1/613a355a1825c65d1f0a6a8a/0caad36a-b5cd-4f5d-8dee-c0e43c0d5d5e/Finding+Fine+Chocolate.jpg?format=2500w",
    title: "Finding Fine Chocolate",
    description:
      "Barbie Van Horn’s blog consists mostly of reviews of chocolate, but also experiences. Van Horn is one of the founders of the Pacific NW Chocolate Society.",
  },
];

const blogsGrid = document.getElementById("blogs-grid");
if (blogsGrid) {
  blogs.forEach((blog) => {
    blogsGrid.innerHTML += `
            <a style="text-decoration: none; font-family: 'aeonik';" href="/main/blog.html?id=${blog.id}">
                <div style="border-radius: 20px;" class="features-item panel vstack gap-4 xl:gap-6 px-4 py-6 xl:px-5 xl:py-8 border border-2 border-black contrast-shadow-md text-black bg-white rotate-1">
                    <div class="feature-item-image">
                        <img style="height: 300px; width: 280px; object-fit: cover;" class="image mx-auto" src="${
                          blog.image
                        }" alt="Twistix">
                    </div>
                    <div class="feature-item-content">
                        <h6 style="color: #E31E23; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;" class="h5 xl:h6">${
                          blog.title
                        }</h6>
                        <p>${blog.description.substring(0, 100)}</p>
                    </div>
                </div>
            </a>
        `;
  });
}

const rollis1 = document.querySelector("#rollis1");
const rollis2 = document.querySelector("#rollis2");

gsap.to(rollis1, {
  scrollTrigger: {
    trigger: ".crafted-perfection-section",
    start: "top 20%",
    end: "60% center",
    scrub: 2,
  },
  top: "40%",
  right: "100%",
  ease: "power2.inOut",
});

gsap.to(rollis2, {
  scrollTrigger: {
    trigger: ".crafted-perfection-section",
    start: "top 20%",
    end: "60% center",
    scrub: 2,
  },
  bottom: "40%",
  left: "100%",
  ease: "power2.inOut",
});
