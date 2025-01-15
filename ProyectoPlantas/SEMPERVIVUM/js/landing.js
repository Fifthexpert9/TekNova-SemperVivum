let currentImageIndex = 0
const images = document.querySelectorAll("#principal figure img")

function showImage(index) {
  images.forEach((img, i) => {
    img.classList.toggle("active", i === index)
  })
}

function nextImage() {
  currentImageIndex = (currentImageIndex + 1) % images.length
  showImage(currentImageIndex)
}

function prevImage() {
  currentImageIndex = (currentImageIndex - 1 + images.length) % images.length
  showImage(currentImageIndex)
}

// Cambia la imagen automáticamente cada 3 segundos
setInterval(nextImage, 2000)
