#!/bin/bash

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
RESET='\033[0m'

deposit_count=0
declare -A accounts
declare -A transaction_history
declare -a user_info=()

welcome_banner() {
    clear
    echo -e "${YELLOW}**********************************************${RESET}"
    echo -e "${YELLOW}        Welcome to the Bank Management System${RESET}"
    echo -e "${YELLOW}**********************************************${RESET}"
    echo
}

create_account() {
    welcome_banner
    echo -e "${BLUE}**** Create Account ****${RESET}"
    read -p "Enter username: " username
    read -p "Enter user id: " user_id
    read -s -p "Enter password: " password
    echo
    read -p "Enter address: " address
    read -p "Enter initial balance (debit or credit) in BDT: " balance

    accounts["$user_id"]="$username:$password:$address:$balance"
    user_info+=("$user_id" "$username")

    echo
    echo -e "${GREEN}Account created successfully!${RESET}"
    read -p "Press Enter to go back to the main menu."
}

login() {
    welcome_banner
    echo -e "${BLUE}**** Login ****${RESET}"
    read -p "Enter username or user id: " input_id
    read -s -p "Enter password: " input_password
    echo

    if [[ -n ${accounts["$input_id"]} ]]; then
        IFS=':' read -r username stored_password address balance <<< "${accounts["$input_id"]}"

        if [ "$input_password" == "$stored_password" ]; then
            welcome_banner
            echo -e "${GREEN}Login successful! Welcome, $username${RESET}"
            read -p "Press Enter to go back to the main menu."
        else
            echo -e "${RED}Incorrect password. Login failed.${RESET}"
            read -p "Press Enter to go back to the main menu."
        fi
    else
        echo -e "${RED}User id not found. Login failed.${RESET}"
        read -p "Press Enter to go back to the main menu."
    fi
}

view_account_details() {
    welcome_banner
    echo -e "${BLUE}**** View Account Details ****${RESET}"
    read -p "Enter user id: " user_id

    if [[ -n ${accounts["$user_id"]} ]]; then
        echo -e "Account Details for User ID $user_id:"
        echo -e "Username: $(cut -d':' -f1 <<< "${accounts["$user_id"]}")"
        echo -e "Address: $(cut -d':' -f3 <<< "${accounts["$user_id"]}")"
        echo -e "Balance: $(cut -d':' -f4 <<< "${accounts["$user_id"]}") BDT"
    else
        echo -e "${RED}User id not found.${RESET}"
    fi

    read -p "Press Enter to go back to the main menu."
}

deposit() {
    welcome_banner
    echo -e "${BLUE}**** Deposit ****${RESET}"
    read -p "Enter user id: " user_id
    read -p "Enter amount in BDT: " amount

    if [[ -n ${accounts["$user_id"]} ]]; then
        IFS=':' read -r username password address balance <<< "${accounts["$user_id"]}"
        new_balance=$((balance + amount))
        accounts["$user_id"]="$username:$password:$address:$new_balance"
        ((deposit_count++))
        transaction_history["$user_id"]+="Deposit: +$amount BDT | "
        welcome_banner
        echo -e "${GREEN}Deposit successful! New balance: $new_balance BDT${RESET}"
    else
        echo -e "${RED}User id not found. Deposit failed.${RESET}"
    fi

    read -p "Press Enter to go back to the main menu."
}

count_deposits() {
    welcome_banner
    echo -e "${BLUE}**** Count Number of Deposits ****${RESET}"
    echo -e "Total number of deposits: ${GREEN}$deposit_count${RESET}"
    read -p "Press Enter to go back to the main menu."
}

withdraw() {
    welcome_banner
    echo -e "${BLUE}**** Withdraw ****${RESET}"
    read -p "Enter user id: " user_id
    read -p "Enter amount in BDT to withdraw: " amount

    if [[ -n ${accounts["$user_id"]} ]]; then
        IFS=':' read -r username password address balance <<< "${accounts["$user_id"]}"
        new_balance=$((balance - amount))

        if [ "$new_balance" -ge 0 ]; then
            accounts["$user_id"]="$username:$password:$address:$new_balance"
            transaction_history["$user_id"]+="Withdrawal: -$amount BDT | "
            welcome_banner
            echo -e "${GREEN}Withdrawal successful! New balance: $new_balance BDT${RESET}"
        else
            echo -e "${RED}Insufficient balance. Withdrawal failed.${RESET}"
        fi
    else
        echo -e "${RED}User id not found. Withdrawal failed.${RESET}"
    fi

    read -p "Press Enter to go back to the main menu."
}

show_transaction_history() {
    welcome_banner
    echo -e "${BLUE}**** Transaction History ****${RESET}"
    read -p "Enter user id: " user_id
    read -s -p "Enter password: " input_password
    echo

    if [[ -n ${accounts["$user_id"]} ]]; then
        IFS=':' read -r username stored_password address balance <<< "${accounts["$user_id"]}"

        if [ "$input_password" == "$stored_password" ]; then
            welcome_banner
            echo -e "Transaction history for User ID $user_id:"
            echo -e "${GREEN}${transaction_history["$user_id"]}${RESET}"
        else
            echo -e "${RED}Incorrect password. Unable to show transaction history.${RESET}"
        fi
    else
        echo -e "${RED}User id not found. Unable to show transaction history.${RESET}"
    fi

    read -p "Press Enter to go back to the main menu."
}

logout() {
    welcome_banner
    echo -e "${BLUE}**** Logout ****${RESET}"
    echo -e "${GREEN}Logged out successfully!${RESET}"
    read -p "Press Enter to go back to the main menu."
}

show_all_accounts() {
    welcome_banner
    echo -e "${BLUE}**** Show All Accounts ****${RESET}"

    IFS=$'\n' sorted_user_info=($(sort <<<"${user_info[*]}"))

    printf "%-15s %-15s\n" "User ID" "Username"
    echo "-------------------------"
    
    for ((i = 0; i < ${#sorted_user_info[@]}; i+=2)); do
        user_id=${sorted_user_info[i]}
        username=${sorted_user_info[i+1]}
        printf "%-15s %-15s\n" "$user_id" "$username"
    done

    read -p "Press Enter to go back to the main menu."
}

delete_user() {
    welcome_banner
    echo -e "${BLUE}**** Delete User/Customer ****${RESET}"
    read -p "Enter user id to delete: " user_id

    if [[ -n ${accounts["$user_id"]} ]]; then
        unset accounts["$user_id"]
        unset transaction_history["$user_id"]
        user_info=("${user_info[@]/$user_id}")
        user_info=("${user_info[@]/${accounts["$user_id"]}}")

        echo -e "${GREEN}User with user id $user_id deleted successfully.${RESET}"
    else
        echo -e "${RED}User id not found. Deletion failed.${RESET}"
    fi

    read -p "Press Enter to go back to the main menu."
}

search_user_by_id() {
    welcome_banner
    echo -e "${BLUE}**** Search Customer Account by User ID ****${RESET}"
    read -p "Enter user id to search: " user_id

    if [[ -n ${accounts["$user_id"]} ]]; then
        echo -e "Account Details for User ID $user_id:"
        echo -e "Username: $(cut -d':' -f1 <<< "${accounts["$user_id"]}")"
        echo -e "Address: $(cut -d':' -f3 <<< "${accounts["$user_id"]}")"
        echo -e "Balance: $(cut -d':' -f4 <<< "${accounts["$user_id"]}") BDT"
    else
        echo -e "${RED}User id not found.${RESET}"
    fi

    read -p "Press Enter to go back to the main menu."
}

clear_screen() {
    clear
}

while true; do
    welcome_banner
    echo -e "${YELLOW}1. Create Account${RESET}"
    echo -e "${YELLOW}2. Login${RESET}"
    echo -e "${YELLOW}3. View Account Details${RESET}"
    echo -e "${YELLOW}4. Deposit${RESET}"
    echo -e "${YELLOW}5. Count Number of Deposits${RESET}"
    echo -e "${YELLOW}6. Withdraw${RESET}"
    echo -e "${YELLOW}7. Show Transaction History${RESET}"
    echo -e "${YELLOW}8. Logout${RESET}"
    echo -e "${YELLOW}9. Show All Accounts${RESET}"
    echo -e "${YELLOW}10. Delete User/Customer${RESET}"
    echo -e "${YELLOW}11. Search Customer Account by User ID${RESET}"
    echo -e "${YELLOW}12. Clear Screen${RESET}"
    echo -e "${YELLOW}13. Exit${RESET}"
    read -p "Enter your choice: " choice

    case $choice in
        1)
            create_account
            ;;
        2)
            login
            ;;
        3)
            view_account_details
            ;;
        4)
            deposit
            ;;
        5)
            count_deposits
            ;;
        6)
            withdraw
            ;;
        7)
            show_transaction_history
            ;;
        8)
            logout
            ;;
        9)
            show_all_accounts
            ;;
        10)
            delete_user
            ;;
        11)
            search_user_by_id
            ;;
        12)
            clear_screen
            ;;
        13)
            clear_screen
            echo -e "${YELLOW}Thank you for using the Bank Management System. Goodbye!${RESET}"
            exit 0
            ;;
        *)
            echo -e "${RED}Invalid choice. Please try again.${RESET}"
            read -p "Press Enter to continue."
            ;;
    esac
done
