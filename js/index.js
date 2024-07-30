function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.querySelector('.content').style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.querySelector('.content').style.marginLeft= "0";
}

function showBooks() {
  document.querySelector('.books-section').style.display = 'block';
  document.querySelector('#books').scrollIntoView({ behavior: 'smooth' });
}

function showAuthors() {
  document.querySelector('.authors-section').style.display = 'block';
  document.querySelector('#authors').scrollIntoView({ behavior: 'smooth' });
}


