#include<stdio.h>
#include<stdlib.h>
#include<string.h>

struct Node {
    char name[50];
    int qty;
    float price;
    int id;
    struct Node *prev, *next;
};

struct Node *headC = NULL, *newNode, *tailC = NULL;
struct Node *headA = NULL, *tailA = NULL;
struct Node *headS = NULL;

void adminMenu() {
    printf("\n\t1. View Sales\n\t2. Add Item\n\t3. Delete Item\n\t4. Show Menu\n\t5. Main Menu\nEnter Choice: ");
}

void customerMenu() {
    printf("\n\t1. Place Order\n\t2. View Order\n\t3. Remove Item\n\t4. Final Bill\n\t5. Main Menu\nEnter Choice: ");
}

struct Node* addItem(struct Node *head, int id, char name[25], float price) {
    newNode = (struct Node*)malloc(sizeof(struct Node));
    newNode->id = id;
    newNode->price = price;
    newNode->qty = 0;
    strcpy(newNode->name, name);
    newNode->next = newNode->prev = NULL;

    if (head == NULL)
        return headA = tailA = newNode;

    struct Node *temp = head;
    while (temp->next) temp = temp->next;

    temp->next = newNode;
    newNode->prev = tailA;
    tailA = newNode;
    return headA;
}

struct Node* placeOrder(struct Node *head, int id, int qty) {
    newNode = (struct Node*)malloc(sizeof(struct Node));
    struct Node *temp = headA;
    while (temp && temp->id != id) temp = temp->next;

    if (!temp) {
        printf("\nItem not found in menu!\n");
        return headC;
    }

    newNode->id = id;
    newNode->price = qty * temp->price;
    newNode->qty = qty;
    strcpy(newNode->name, temp->name);
    newNode->next = newNode->prev = NULL;

    if (head == NULL)
        return headC = tailC = newNode;

    temp = head;
    while (temp->next) temp = temp->next;

    temp->next = newNode;
    newNode->prev = tailC;
    tailC = newNode;
    return headC;
}

void displayList(struct Node *head) {
    struct Node *temp = head;
    if (!temp) {
        printf("\nList is empty!\n");
        return;
    }

    printf("\n");
    while (temp) {
        if (temp->qty == 0)
            printf("%d\t%s\t%.2f\n", temp->id, temp->name, temp->price);
        else
            printf("%d\t%s\t%d\t%.2f\n", temp->id, temp->name, temp->qty, temp->price);

        temp = temp->next;
    }
    printf("\n");
}

struct Node* updateSales(int id, int qty) {
    newNode = (struct Node*)malloc(sizeof(struct Node));
    struct Node *temp = headA;
    while (temp->id != id) temp = temp->next;

    newNode->id = id;
    newNode->price = qty * temp->price;
    newNode->qty = qty;
    strcpy(newNode->name, temp->name);
    newNode->next = newNode->prev = NULL;

    if (!headS)
        return headS = newNode;

    temp = headS;
    while (temp->next) {
        if (temp->id == id) {
            temp->qty += qty;
            temp->price += newNode->price;
            free(newNode);
            return headS;
        }
        temp = temp->next;
    }
    temp->next = newNode;
    return headS;
}

void calculateTotalSales() {
    struct Node *temp = headC;
    while (temp) {
        headS = updateSales(temp->id, temp->qty);
        temp = temp->next;
    }
}

struct Node* deleteItem(int id, struct Node *head, struct Node* tail) {
    if (!head) {
        printf("\nList is empty\n");
        return head;
    }

    struct Node* temp;
    if (id == head->id) {
        temp = head;
        head = head->next;
        if (head) head->prev = NULL;
        free(temp);
    } else if (id == tail->id) {
        temp = tail;
        tail = tail->prev;
        tail->next = NULL;
        free(temp);
    } else {
        temp = head;
        while (temp && temp->id != id) temp = temp->next;
        if (temp) {
            temp->prev->next = temp->next;
            if (temp->next) temp->next->prev = temp->prev;
            free(temp);
        }
    }
    return head;
}

int removeAdminItem() {
    printf("Enter item ID to delete: ");
    int id;
    scanf("%d", &id);

    struct Node* temp = headA;
    while (temp) {
        if (temp->id == id) {
            headA = deleteItem(id, headA, tailA);
            return 1;
        }
        temp = temp->next;
    }
    return 0;
}

int removeCustomerItem() {
    printf("Enter item ID to delete: ");
    int id;
    scanf("%d", &id);

    struct Node* temp = headC;
    while (temp) {
        if (temp->id == id) {
            headC = deleteItem(id, headC, tailC);
            return 1;
        }
        temp = temp->next;
    }
    return 0;
}

void showBill() {
    displayList(headC);
    struct Node *temp = headC;
    float total = 0;
    while (temp) {
        total += temp->price;
        temp = temp->next;
    }
    printf("Total: %.2f\n", total);
}

struct Node* clearList(struct Node* head) {
    if (!head) return NULL;

    struct Node* temp = head;
    while (temp->next) {
        temp = temp->next;
        free(temp->prev);
    }
    free(temp);
    return NULL;
}

void adminSection() {
    printf("\n\t--- ADMIN SECTION ---\n");
    while (1) {
        adminMenu();
        int choice;
        scanf("%d", &choice);

        if (choice == 5) break;

        switch (choice) {
            case 1:
                displayList(headS);
                break;
            case 2:
                printf("Enter item ID, name, price: ");
                int id;
                char name[50];
                float price;
                scanf("%d %s %f", &id, name, &price);
                headA = addItem(headA, id, name, price);
                printf("Item added!\n");
                break;
            case 3:
                if (removeAdminItem()) {
                    printf("Item removed!\n");
                    displayList(headA);
                } else {
                    printf("Item not found!\n");
                }
                break;
            case 4:
                printf("Menu:\n");
                displayList(headA);
                break;
            default:
                printf("Invalid choice!\n");
                break;
        }
    }
}

void customerSection() {
    printf("\n\t--- CUSTOMER SECTION ---\n");
    while (1) {
        customerMenu();
        int choice;
        scanf("%d", &choice);

        if (choice == 5) break;

        switch (choice) {
            case 1:
                displayList(headA);
                printf("Enter item ID, quantity: ");
                int id, qty;
                scanf("%d %d", &id, &qty);
                headC = placeOrder(headC, id, qty);
                break;
            case 2:
                printf("Your order:\n");
                displayList(headC);
                break;
            case 3:
                if (removeCustomerItem()) {
                    printf("Item removed!\n");
                    displayList(headC);
                } else {
                    printf("Item not found!\n");
                }
                break;
            case 4:
                calculateTotalSales();
                printf("Final Bill:\n");
                showBill();
                headC = clearList(headC);
                printf("Press any key to return to main menu.");
                getchar(); getchar();
                return;
            default:
                printf("Invalid choice!\n");
                break;
        }
    }
}

void mainMenu() {
    printf("\n--- RESTAURANT MANAGEMENT SYSTEM ---\n");
    printf("1. Admin\n2. Customer\n3. Exit\nEnter choice: ");
}

int main() {
    headA = addItem(headA, 1, "Soup", 100);
    headA = addItem(headA, 2, "Noodles", 200);
    headA = addItem(headA, 3, "Rice", 150);
    headA = addItem(headA, 4, "Salad", 80);

    while (1) {
        mainMenu();
        int choice;
        scanf("%d", &choice);

        if (choice == 3) {
            printf("Thank you!\n");
            break;
        }

        switch (choice) {
            case 1:
                adminSection();
                break;
            case 2:
                customerSection();
                break;
            default:
                printf("Invalid choice!\n");
                break;
        }
    }
    return 0;
}
