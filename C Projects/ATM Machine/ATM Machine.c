#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <math.h>

// Function Prototypes
void displayLogin();
void displayMainMenu();
void showBalance(float currentBalance);
float depositMoney(float currentBalance);
float withdrawMoney(float currentBalance);
void exitMenu();
void displayErrorMessage();

// Main Function
int main()
{
    int userChoice;
    float accountBalance = 0.00;
    int continueTransaction;

    bool repeatTransaction = true;

    while (repeatTransaction)
    {
        displayMainMenu();

        printf("=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n");
        printf("Your Selection: ");
        scanf("%d", &userChoice);

        switch (userChoice)
        {
        case 1:
            system("CLS");
            showBalance(accountBalance);
            break;
        case 2:
            system("CLS");
            accountBalance = depositMoney(accountBalance);
            break;
        case 3:
            system("CLS");
            accountBalance = withdrawMoney(accountBalance);
            break;
        case 4:
            system("CLS");
            exitMenu();
            return 0;
        default:
            displayErrorMessage();
            break;
        }

        printf("=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n");
        printf("Would you like to do another transaction?\n");
        printf("< 1 > Yes\n");
        printf("< 2 > No\n");
        scanf("%d", &continueTransaction);

        system("CLS");

        if (continueTransaction == 2)
        {
            repeatTransaction = false;
            exitMenu();
        }
        else if (continueTransaction != 1)
        {
            printf("Invalid input, please try again!\n\n");
            printf("=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n");
            printf("Would you like to do another transaction?\n");
            printf("< 1 > Yes\n");
            printf("< 2 > No\n");
            scanf("%d", &continueTransaction);
            system("CLS");

            if (continueTransaction == 2)
            {
                repeatTransaction = false;
                exitMenu();
            }
        }
    }

    return 0;
}

// Function Definitions

void displayMainMenu()
{
    printf("****************** Welcome! *******************\n");
    printf("********** Welcome to ATM Banking ***********\n\n");
    printf("**** Please choose one of the options below ****\n\n");
    printf("< 1 >  Check Balance\n");
    printf("< 2 >  Deposit\n");
    printf("< 3 >  Withdraw\n");
    printf("< 4 >  Exit\n\n");
}

void showBalance(float currentBalance)
{
    printf("You chose to check your balance\n");
    printf("\n\n**** Your Available Balance is:   $%.2f\n\n", currentBalance);
}

float depositMoney(float currentBalance)
{
    float depositAmount;
    printf("You chose to deposit money\n");
    printf("$$$$ Your Balance is: $%.2f\n\n", currentBalance);
    printf("**** Enter the amount to deposit: ");
    scanf("%f", &depositAmount);

    currentBalance += depositAmount;

    printf("\n**** Your New Balance is:   $%.2f\n\n", currentBalance);
    return currentBalance;
}

float withdrawMoney(float currentBalance)
{
    float withdrawAmount;
    bool validWithdrawal = true;

    printf("You chose to withdraw money\n");
    printf("$$$$ Your Balance is: $%.2f\n\n", currentBalance);

    while (validWithdrawal)
    {
        printf("Enter the amount to withdraw: ");
        scanf("%f", &withdrawAmount);

        if (withdrawAmount <= currentBalance)
        {
            validWithdrawal = false;
            currentBalance -= withdrawAmount;
            printf("\n$$$$ Your withdrawal amount is:  $%.2f\n", withdrawAmount);
            printf("**** Your New Balance is:   $%.2f\n\n", currentBalance);
        }
        else
        {
            printf("*** Insufficient funds ***\n");
            printf("Please contact your bank's customer service.\n\n");
            break;
        }
    }
    return currentBalance;
}

void exitMenu()
{
    printf("-------------- Take your receipt! ------------------\n");
    printf("----- Thank you for using the ATM Banking Machine! -----\n");
}

void displayErrorMessage()
{
    printf("+++ Invalid selection! Please try again. +++\n");
}


//Md Yeasin Arafat - 211002121
