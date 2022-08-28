import mysql.connector
import pandas as pd

# pip install mysql-connector-python
# creates a connection with the mysql server
conn = mysql.connector.connect(
    host='localhost', user='root', passwd='****', database='news')
myCursor = conn.cursor()


def main():
    # load the news dataset
    dataset = pd.read_csv('Recommendations.csv')
    for i in range(len(dataset)):
        publication_number = str(dataset.iloc[i, 2])
        recommendation_1 = str(dataset.iloc[i, 3])
        recommendation_2 = str(dataset.iloc[i, 4])
        recommendation_3 = str(dataset.iloc[i, 5])
        tuple1 = (publication_number, recommendation_1,
                  recommendation_2, recommendation_3)
        # import the dataset to the sql database
        query1 = 'INSERT INTO recommendations (publication_number, recommendation_1, recommendation_2, recommendation_3) VALUES (%s,%s,%s,%s)'
        myCursor.execute(query1, tuple1)
        conn.commit()


if __name__ == "__main__":
    main()
