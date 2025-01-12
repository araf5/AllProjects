#include<iostream>
#include<fstream>
using namespace std;

class SudokuBoard {
	int board[9][9];
	int editable[9][9];

	public:
		SudokuBoard() {
			displayMenu();
		}

	private:
		void displayMenu() {
			cout << "\n======================\n";
			cout << "    Sudoku Solver\n";
			cout << "======================\n\n";

			cout << "Welcome to Sudoku Solver!\n";
			cout << "Input the puzzle:\n\n";
			cout << "1. Enter values manually. (Enter 1)\n";
			cout << "2. Read puzzle from file. (Enter 2)\n";
			cout << "   Follow file format rules.\n";
			cout << "   --> ";

			int choice;
			cin >> choice;

			if (choice == 1) enterBoardValues();
			else if (choice == 2) readBoardFromFile();
			else {
				while (true) {
					cout << "\nInvalid choice. Try again.\n";
					cout << "   --> ";
					cin >> choice;

					if (choice == 1) enterBoardValues();
					else if (choice == 2) readBoardFromFile();
					else continue;

					break;
				}
			}
		}

	private:
		void enterBoardValues() {
			cout << "\nEnter values (0 for empty cells).\n\n";

			for (int row = 0; row < 9; row++) {
				for (int col = 0; col < 9; col++) {
					int value;

					cout << "Enter value for cell[" << row + 1 << "][" << col + 1 << "] --> ";
					cin >> value;

					while (!(value >= 0 && value <= 9)) {
						cout << "Invalid value! Try again.\n";
						cout << "Enter value for cell [" << row + 1 << "][" << col + 1 << "] --> ";
						cin >> value;
					}

					board[row][col] = value;
					editable[row][col] = (value == 0) ? 0 : 1;
				}
				cout << "-------\n";
			}
		}

	private:
		void readBoardFromFile() {
			char filename[30];
			cout << "\nEnter the filename with the Sudoku Puzzle.\n";
			cout << "   --> ";
			cin >> filename;

			ifstream sudokuFile(filename, ios::in);

			for (int row = 0; row < 9; row++) {
				for (int col = 0; col < 9; col++) {
					int value;
					sudokuFile >> value;

					if (!(value >= 0 && value <= 9)) {
						cout << "\nInvalid value in " << filename << "! Correct it and try again.\n";
						exit(EXIT_FAILURE);
					}

					board[row][col] = value;
					editable[row][col] = (value == 0) ? 0 : 1;

					if (sudokuFile.eof()) break;
				}
			}

			sudokuFile.close();
		}

	public:
		void updateCellValue(int row, int col, int num) {
			if (editable[row][col] == 0) board[row][col] = num;
		}

	public:
		int getCellValue(int row, int col) {
			return board[row][col];
		}

	public:
		bool isCellEditable(int row, int col) {
			return editable[row][col] == 0;
		}

	public:
		void clearBoardFrom(int row, int col) {
			for (int i = row; i < 9; i++) {
				for (int j = (i == row ? col : 0); j < 9; j++) {
					if (editable[i][j] == 0) board[i][j] = 0;
				}
			}
		}

	public:
		void displayBoard() {
			cout << "++=====================================++";
			for (int row = 0; row < 9; row++) {
				int cellCount = 1;

				cout << "\n||";
				for (int col = 0; col < 9; col++) {
					cout << " " << board[row][col] << ((cellCount % 3 == 0) ? " ||" : "  ");
					cellCount++;
				}

				cout << (row % 3 == 2 ? "\n++=====================================++" : "\n++-----------++-----------++-----------++");
			}
		}
};

class PossibleValues {
	struct Node {
		int value;
		struct Node* next;
	};

	typedef struct Node* NodePtr;

	NodePtr head;
	NodePtr current;

	public:
		PossibleValues() {
			head = new Node;
			head->next = NULL;
		}

	public:
		~PossibleValues() {
			clear();
		}

	public:
		void append(int number) {
			NodePtr temp = new Node;
			temp->value = number;
			temp->next = NULL;

			current = head;
			while (current->next != NULL) {
				current = current->next;
			}
			current->next = temp;
		}

	public:
		int operator[](int index) {
			int count = 0;
			current = head->next;

			while (current != NULL) {
				if (count == index)
					return current->value;
				current = current->next;
				count++;
			}

			return -1;
		}

	public:
		void print() {
			current = head->next;
			while (current != NULL) {
				cout << current->value << ",";
				current = current->next;
			}
			cout << "\b";
		}

	public:
		int size() {
			int count = 0;
			current = head->next;

			while (current != NULL) {
				count++;
				current = current->next;
			}

			return count;
		}

	public:
		void copy(const PossibleValues& possibilities) {
			int length = possibilities.size();

			current = head;
			for (int i = 0; i < length; i++) {
				NodePtr temp = new Node;
				temp->next = NULL;
				temp->value = possibilities[i];

				current->next = temp;
				current = current->next;
			}
		}

	private:
		void clear() {
			NodePtr temp;
			current = head;
			while (current != NULL) {
				temp = current;
				current = current->next;
				delete temp;
			}
		}
};

class SudokuSolver {
	int recursiveCalls;
	SudokuBoard board;

	public:
		SudokuSolver() {
			recursiveCalls = 0;
			cout << "\nCalculating possibilities...\n";
			cout << "Backtracking across the puzzle...\n";
			cout << "Validating cells and values...\n\n";
			solve();
			cout << "QED. Your puzzle has been solved!\n\n";
			displayBoard();
			cout << "\n\n";
		}

	private:
		bool isValueValid(int row, int col, int value) {
			for (int i = 0; i < 9; i++) {
				if (i != row && board.getCellValue(i, col) == value) return false;
				if (i != col && board.getCellValue(row, i) == value) return false;
			}

			return isSubgridValid(row, col, value);
		}

	private:
		bool isSubgridValid(int row, int col, int value) {
			int rowStart = (row / 3) * 3;
			int colStart = (col / 3) * 3;

			for (int i = rowStart; i < rowStart + 3; i++) {
				for (int j = colStart; j < colStart + 3; j++) {
					if (board.getCellValue(i, j) == value) return false;
				}
			}

			return true;
		}

	private:
		PossibleValues getPossibleValues(int row, int col) {
			PossibleValues possibilities;

			for (int i = 1; i <= 9; i++) {
				if (isValueValid(row, col, i)) {
					possibilities.append(i);
				}
			}

			return possibilities;
		}

	private:
		bool solveCell(int row, int col) {
			incrementStats();

			if (board.isCellEditable(row, col)) {
				PossibleValues possibilities = getPossibleValues(row, col);
				int length = possibilities.size();

				for (int i = 0; i < length; i++) {
					int value = possibilities[i];
					board.updateCellValue(row, col, value);

					int nextRow = row, nextCol = col;
					if (col < 8) nextCol++;
					else if (row < 8) {
						nextRow++;
						nextCol = 0;
					} else return true;

					if (!solveCell(nextRow, nextCol)) {
						board.clearBoardFrom(nextRow, nextCol);
					} else return true;
				}

				return false;
			} else {
				int nextRow = row, nextCol = col;
				if (col < 8) nextCol++;
				else if (row < 8) {
					nextRow++;
					nextCol = 0;
				} else return true;

				return solveCell(nextRow, nextCol);
			}
		}

	private:
		void solve() {
			solveCell(0, 0);
		}

	private:
		void displayBoard() {
			board.displayBoard();
		}

	private:
		void incrementStats() {
			recursiveCalls++;
		}

	public:
		void printStats() {
			cout << "\nThe solveCell() function was called recursively " << recursiveCalls << " times.\n";
		}
};

int main() {
	SudokuSolver solver;
	return 0;
}
