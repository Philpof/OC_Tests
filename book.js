// Exercice final du cours d'OpenClassromms sur le JS

class Book {
    constructor(title, author, description, pages, currentPage, read) {
      this.title = title; // le titre du livre
      this.author = author; // l'auteur du livre
      this.description = description; // une description du livre
      this.pages = pages; // le nombre total de pages
      this.currentPage = currentPage; // la page où se trouve l'utilisateur actuellement (entre 1 et pages)
      this.read = read; // si l'utilisateur a lu ou non le livre (par défaut: false)
    };
    
    // Méthode demandée...attention, ne pas mettre "const" devant "readBook"
    readBook = (page) => {
        if (page < 1 || page > this.pages) {
            return 0;
        } 
        else if (page >= 1 && page < this.pages) {
            this.currentPage = page;
            return 1;
        } else if (page = this.pages) {
            this.currentPage = page;
            this.read = true;
            return 1;
        };
    };

};

let book1 = new Book("Poil", "Raoul", "Une histoire de poil.", 5, 1, false);
let book2 = new Book("Guitare", "Alex", "Les Paul tranquille !", 10, 1, false);
let book3 = new Book("Youpi", "John", "Vive les copains !", 15, 1, false);
let book4 = new Book("Dev", "Phil", "Once Upon A Time...", 20, 1, false);

const books = [book1, book2, book3, book4];

// Pour la vérif
console.log(books);