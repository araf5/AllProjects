int main() {
    int choice;
    do {
        printf("Library Management:\n");
        printf("1. Add Book\n2. Remove Book\n3. Search Book\n4. View All Books\n5. Exit\n");
        printf("Enter your choice: ");
        scanf("%d", &choice);
        switch (choice) {
            case 1: addNewBook(); break;
            case 2: removeBook(); break;
            case 3: findBookByName(); break;
            case 4: showBooks(); break;
            case 5: closeApp(); break;
            default: printf("Invalid choice!\n");
        }
    } while (choice != 5);
    return 0;
}
