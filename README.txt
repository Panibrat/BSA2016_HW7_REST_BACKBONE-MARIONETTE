���������� ���������� Postman www.getpostman.com

���������� ����� ����� � ����������:
url: http://localhost:8000/books
POST
body:
       {"author": "Pushkin",
       "title": "King Kong",
       "year": "2000",
       "genre": "travel"}
	   
�������� ����� �� ����������:
url: http://localhost:8000/books/{book_id}
DELETE

�������������� ��������� ���������� � �����
url: http://localhost:8000/books/{book_id}
GET

�������������� ������ ����, ��������� � ����������
url: http://localhost:8000/books
GET

�������������� ������ ����, ������� ���� ������������ ������������:
url: http://localhost:8000/users/{user_id}/books
GET

���������� ����� �� ������������� ������������ � ���������
url: //http://localhost:8000/users/{user_id}/books/{book_id}
DELETE

����������� ����� ������������� ������������
url: //http://localhost:8000/users/{user_id}/books/{book_id}
GET

���������� ������ ������� �� ������������ ������������
url: http://localhost:8000/users/{id}
GET


