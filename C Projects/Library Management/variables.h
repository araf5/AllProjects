struct Book {
    int id;
    char name[50];
    char author[50];
    float price;
};

struct Book book;
FILE *filePtr;
int bookCount = 0;
