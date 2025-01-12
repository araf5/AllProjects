#include <stdio.h>
#include <string.h>
#include <conio.h>
#include <stdlib.h>
#include <windows.h>

struct Student {
    char id[15];
    char name[20];
    char address[20];
    char parent[20];
    int class;
    long unsigned int phone;
};

struct Student student;

void setTextColor(int fgColor) {
    HANDLE hConsole = GetStdHandle(STD_OUTPUT_HANDLE);
    SetConsoleTextAttribute(hConsole, fgColor);
}

void clearScreen(int fgColor, int bgColor) {
    WORD color = ((bgColor & 0x0F) << 4) + (fgColor & 0x0F);
    HANDLE hConsole = GetStdHandle(STD_OUTPUT_HANDLE);
    COORD coord = {0, 0};
    DWORD count;
    CONSOLE_SCREEN_BUFFER_INFO csbi;
    
    SetConsoleTextAttribute(hConsole, color);
    if (GetConsoleScreenBufferInfo(hConsole, &csbi)) {
        FillConsoleOutputCharacter(hConsole, ' ', csbi.dwSize.X * csbi.dwSize.Y, coord, &count);
        SetConsoleCursorPosition(hConsole, coord);
    }
}

void gotoXY(int x, int y) {
    COORD coord = {x, y};
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), coord);
}

void drawBox() {
    int i;
    gotoXY(0, 0);
    printf("%c", 201);
    for (i = 1; i < 78; i++) printf("%c", 205);
    printf("%c", 187);

    for (i = 1; i < 25; i++) {
        gotoXY(0, i);
        printf("%c", 186);
        gotoXY(78, i);
        printf("%c", 186);
    }

    gotoXY(0, 25);
    printf("%c", 200);
    for (i = 1; i < 78; i++) printf("%c", 205);
    printf("%c", 188);
}

void clearBox() {
    for (int i = 1; i < 78; i++) {
        for (int j = 1; j < 25; j++) {
            gotoXY(i, j);
            printf(" ");
        }
    }
}

void heading(const char title[]) {
    setTextColor(31);
    gotoXY(40, 4);
    printf("%s", title);
    setTextColor(15);
}

void getPassword(char* password) {
    int i = 0;
    char ch;
    while (1) {
        ch = getch();
        if (ch == 13) break;
        else if (ch == 8 && i > 0) {
            printf("\b \b");
            i--;
        } else {
            printf("*");
            password[i++] = ch;
        }
    }
    password[i] = '\0';
}

void addRecord() {
    clearBox();
    heading("Add Student Record");

    FILE* fp = fopen("students.dat", "ab+");
    if (!fp) {
        MessageBox(0, "Error opening file", "Warning", 0);
        return;
    }

    gotoXY(35, 8);
    printf("ID: ");
    fflush(stdin);
    gets(student.id);

    gotoXY(35, 10);
    printf("Name: ");
    gets(student.name);

    gotoXY(35, 12);
    printf("Address: ");
    gets(student.address);

    gotoXY(35, 14);
    printf("Parent: ");
    gets(student.parent);

    gotoXY(35, 16);
    printf("Class: ");
    scanf("%d", &student.class);

    gotoXY(35, 18);
    printf("Phone: ");
    scanf("%lu", &student.phone);

    fwrite(&student, sizeof(student), 1, fp);
    fclose(fp);

    gotoXY(35, 20);
    printf("Record added successfully");
}

void searchRecord() {
    clearBox();
    heading("Search Student Record");

    char id[15];
    int found = 0;

    FILE* fp = fopen("students.dat", "rb");
    if (!fp) return;

    gotoXY(35, 8);
    printf("Enter ID to search: ");
    fflush(stdin);
    gets(id);

    while (fread(&student, sizeof(student), 1, fp)) {
        if (strcmp(id, student.id) == 0) {
            found = 1;
            break;
        }
    }

    if (found) {
        gotoXY(35, 10);
        printf("ID: %s", student.id);
        gotoXY(35, 12);
        printf("Name: %s", student.name);
        gotoXY(35, 14);
        printf("Address: %s", student.address);
        gotoXY(35, 16);
        printf("Parent: %s", student.parent);
        gotoXY(35, 18);
        printf("Class: %d", student.class);
        gotoXY(35, 20);
        printf("Phone: %lu", student.phone);
    } else {
        gotoXY(35, 10);
        printf("Record not found");
    }
    fclose(fp);
}

void modifyRecord() {
    clearBox();
    heading("Modify Student Record");

    char id[15];
    int found = 0;

    FILE* fp = fopen("students.dat", "rb+");
    if (!fp) return;

    gotoXY(35, 8);
    printf("Enter ID to modify: ");
    fflush(stdin);
    gets(id);

    while (fread(&student, sizeof(student), 1, fp)) {
        if (strcmp(id, student.id) == 0) {
            found = 1;

            gotoXY(35, 10);
            printf("New Name: ");
            fflush(stdin);
            gets(student.name);

            gotoXY(35, 12);
            printf("New Address: ");
            gets(student.address);

            gotoXY(35, 14);
            printf("New Parent: ");
            gets(student.parent);

            gotoXY(35, 16);
            printf("New Class: ");
            scanf("%d", &student.class);

            gotoXY(35, 18);
            printf("New Phone: ");
            scanf("%lu", &student.phone);

            fseek(fp, -sizeof(student), SEEK_CUR);
            fwrite(&student, sizeof(student), 1, fp);
            break;
        }
    }

    if (!found) {
        gotoXY(35, 10);
        printf("Record not found");
    } else {
        gotoXY(35, 20);
        printf("Record modified successfully");
    }
    fclose(fp);
}

void deleteRecord() {
    clearBox();
    heading("Delete Student Record");

    char id[15];
    int found = 0;

    FILE* fp = fopen("students.dat", "rb");
    FILE* temp = fopen("temp.dat", "wb");

    gotoXY(35, 8);
    printf("Enter ID to delete: ");
    fflush(stdin);
    gets(id);

    while (fread(&student, sizeof(student), 1, fp)) {
        if (strcmp(id, student.id) != 0) {
            fwrite(&student, sizeof(student), 1, temp);
        } else {
            found = 1;
        }
    }

    fclose(fp);
    fclose(temp);
    remove("students.dat");
    rename("temp.dat", "students.dat");

    gotoXY(35, 10);
    if (found) printf("Record deleted successfully");
    else printf("Record not found");
}

void menu() {
    int choice;
    while (1) {
        clearScreen(15, 0);
        drawBox();
        setTextColor(11);
        gotoXY(30, 5);
        printf("STUDENT RECORD SYSTEM");
        setTextColor(15);

        gotoXY(35, 8);
        printf("1. Add Student");
        gotoXY(35, 10);
        printf("2. Search Student");
        gotoXY(35, 12);
        printf("3. Modify Student");
        gotoXY(35, 14);
        printf("4. Delete Student");
        gotoXY(35, 16);
        printf("5. Exit");

        gotoXY(35, 18);
        printf("Enter your choice: ");
        scanf("%d", &choice);

        switch (choice) {
            case 1:
                addRecord();
                break;
            case 2:
                searchRecord();
                break;
            case 3:
                modifyRecord();
                break;
            case 4:
                deleteRecord();
                break;
            case 5:
                exit(0);
            default:
                gotoXY(35, 20);
                printf("Invalid choice!");
        }
    }
}

int main() {
    clearScreen(15, 0);
    menu();
    return 0;
}
