// Renamed and optimized functions
void moveCursor(int x, int y) {
    coord.X = x; coord.Y = y;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), coord);
}

void waitForEnter() {
    printf("\nPress ENTER to return");
    while (getch() != 13);
    showMainMenu();
}

void maskPasswordInput(char* pass) {
    int i = 0;
    while (1) {
        pass[i] = getch();
        if (pass[i] == 13) break;
        else if (pass[i] == 8 && i > 0) {
            printf("\b \b");
            i--;
        } else {
            printf("*");
            i++;
        }
    }
    pass[i] = '\0';
}

void closeApp() {
    system("cls");
    printf("Exiting in 3 seconds...\n");
    Sleep(3000);
    exit(0);
}
