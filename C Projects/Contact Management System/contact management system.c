#include<stdio.h>
#include<string.h>
#include<stdlib.h>

struct Contact {
    long phone;
    char name[20], address[20], email[30];
} contact;

FILE *file, *tempFile;
int choice, found;

void addContact();
void listContacts();
void searchContact();
void editContact();
void deleteContact();
void menu();

int main() {
    menu();
    return 0;
}

void menu() {
    do {
        system("cls");
        printf("\n\t **** Contact Management System ****");
        printf("\n\n\t\t1. Add Contact\n\t\t2. List Contacts\n\t\t3. Search Contact\n\t\t4. Edit Contact\n\t\t5. Delete Contact\n\t\t0. Exit");
        printf("\n\nEnter your choice: ");
        scanf("%d", &choice);

        switch (choice) {
            case 1: addContact(); break;
            case 2: listContacts(); break;
            case 3: searchContact(); break;
            case 4: editContact(); break;
            case 5: deleteContact(); break;
            case 0: exit(0);
            default: printf("\nInvalid choice!");
        }
    } while (choice != 0);
}

void addContact() {
    system("cls");
    file = fopen("contacts.dat", "a");
    while (1) {
        fflush(stdin);
        printf("Enter name (or blank to exit): ");
        gets(contact.name);
        if (strlen(contact.name) == 0) break;

        printf("Phone: ");
        scanf("%ld", &contact.phone);
        fflush(stdin);
        printf("Address: ");
        gets(contact.address);
        printf("Email: ");
        gets(contact.email);

        fwrite(&contact, sizeof(contact), 1, file);
    }
    fclose(file);
}

void listContacts() {
    system("cls");
    printf("\n\t\tLIST OF CONTACTS\n\nName\t\tPhone\t\tAddress\t\tEmail\n");
    printf("============================================================\n");

    file = fopen("contacts.dat", "r");
    while (fread(&contact, sizeof(contact), 1, file)) {
        printf("%-10s\t%ld\t%-10s\t%s\n", contact.name, contact.phone, contact.address, contact.email);
    }
    fclose(file);
    getch();
}

void searchContact() {
    char searchName[20];
    system("cls");
    printf("Enter name to search: ");
    fflush(stdin);
    gets(searchName);

    file = fopen("contacts.dat", "r");
    found = 0;
    while (fread(&contact, sizeof(contact), 1, file)) {
        if (stricmp(contact.name, searchName) == 0) {
            printf("\nName: %s\nPhone: %ld\nAddress: %s\nEmail: %s\n", contact.name, contact.phone, contact.address, contact.email);
            found = 1;
        }
    }
    fclose(file);
    if (!found) printf("\nNo contact found!");
    getch();
}

void editContact() {
    char editName[20];
    system("cls");
    printf("Enter name to edit: ");
    fflush(stdin);
    gets(editName);

    file = fopen("contacts.dat", "r");
    tempFile = fopen("temp.dat", "w");
    found = 0;
    while (fread(&contact, sizeof(contact), 1, file)) {
        if (stricmp(contact.name, editName) == 0) {
            found = 1;
            printf("\nEditing '%s'\n", contact.name);
            printf("New Name: ");
            gets(contact.name);
            printf("New Phone: ");
            scanf("%ld", &contact.phone);
            fflush(stdin);
            printf("New Address: ");
            gets(contact.address);
            printf("New Email: ");
            gets(contact.email);
        }
        fwrite(&contact, sizeof(contact), 1, tempFile);
    }
    fclose(file);
    fclose(tempFile);

    remove("contacts.dat");
    rename("temp.dat", "contacts.dat");

    if (!found) printf("\nNo contact found!");
    getch();
}

void deleteContact() {
    char deleteName[20];
    system("cls");
    printf("Enter name to delete: ");
    fflush(stdin);
    gets(deleteName);

    file = fopen("contacts.dat", "r");
    tempFile = fopen("temp.dat", "w");
    found = 0;
    while (fread(&contact, sizeof(contact), 1, file)) {
        if (stricmp(contact.name, deleteName) != 0) {
            fwrite(&contact, sizeof(contact), 1, tempFile);
        } else {
            found = 1;
        }
    }
    fclose(file);
    fclose(tempFile);

    remove("contacts.dat");
    rename("temp.dat", "contacts.dat");

    if (!found) printf("\nNo contact found!");
    getch();
}
