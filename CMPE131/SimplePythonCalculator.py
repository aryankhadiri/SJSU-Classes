def addition(x, y):
    return x+y


def division(x, y):

    return x/y


def multiplication(x, y):
    return x*y


def power(x, y):
    return x**y


def subtraction(x, y):
    return x-y


def main():
    valid = True
    while valid:
        print("Enter the first number:")
        x = float(input())
        print("Enter the second number:")
        y = float(input())
        print("Enter the operation: (ex: +, -, /, **, *)")
        operator = input()
        if operator == '+':
            print(addition(x,y))
        elif operator == '-':
            print(subtraction(x,y))
        elif operator == '/':
            print(division(x,y))
        elif operator == '*':
            print(multiplication(x,y))
        elif operator == '**':
            print(power(x,y))
        else:
            print("Wrong input for the operator. The program has ended!")
            break
        print("Do you wish to exit?")
        answer = input()
        if answer == 'y' or answer == 'Y':
            valid = False
        elif answer == 'n' or answer == 'N':
            continue


main()
                

