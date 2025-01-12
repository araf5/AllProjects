void addNewBook() {
    FILE *fp = fopen("Books.dat", "ab+");
    if (!fp) return;
    printf("Enter book details (ID, Name, Author, Price): ");
    scanf("%d %s %s %f", &book.id, book.name, book.author, &book.price);
    fwrite(&book, sizeof(book), 1, fp);
    fclose(fp);
}

void removeBook() {
    FILE *fp = fopen("Books.dat", "rb"), *temp = fopen("Temp.dat", "wb");
    int idToDelete, found = 0;
    printf("Enter Book ID to delete: ");
    scanf("%d", &idToDelete);
    while (fread(&book, sizeof(book), 1, fp)) {
        if (book.id != idToDelete) fwrite(&book, sizeof(book), 1, temp);
        else found = 1;
    }
    fclose(fp); fclose(temp);
    if (found) {
        remove("Books.dat");
        rename("Temp.dat", "Books.dat");
        printf("Book deleted.\n");
    } else printf("Book not found.\n");
}

void findBookByName() {
    FILE *fp = fopen("Books.dat", "rb");
    char searchName[50];
    printf("Enter book name: ");
    scanf("%s", searchName);
    while (fread(&book, sizeof(book), 1, fp)) {
        if (strcmp(book.name, searchName) == 0) {
            printf("Book found: %s by %s, Price: %.2f\n", book.name, book.author, book.price);
            return;
        }
    }
    printf("Book not found.\n");
    fclose(fp);
}

void showBooks() {
    FILE *fp = fopen("Books.dat", "rb");
    printf("Books available:\n");
    while (fread(&book, sizeof(book), 1, fp)) {
        printf("ID: %d, Name: %s, Author: %s, Price: %.2f\n", book.id, book.name, book.author, book.price);
    }
    fclose(fp);
}
