# phishing_detection.py
import sys

def check_phishing(message, phishing_keywords):
    # Your phishing detection logic here
    # Return True if suspicious, False otherwise
    return any(keyword in message for keyword in phishing_keywords)

if __name__ == "__main__":
    # Get command-line arguments
    message = sys.argv[1]
    phishing_keywords = sys.argv[2].split(',')

    # Check if the message is suspicious
    is_suspicious = check_phishing(message, phishing_keywords)

    # Print the result (1 for suspicious, 0 for not suspicious)
    print(1 if is_suspicious else 0)
