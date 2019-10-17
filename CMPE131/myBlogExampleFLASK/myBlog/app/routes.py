from app import app
from app.forms import TopCities
from flask import render_template, flash, redirect, url_for
app.config['SECRET_KEY'] = 'some-key'
@app.route("/")

def home():
    title = "Top Cities"
    name = "Aryan Khadiri"
    top_cities = ['NYC', 'Washington', 'London', 'Rome', 'Madrid']
    form = TopCities()
    return render_template('home.html', title=title, name = name, top_cities = top_cities, form = form)

if __name__ == '__main__':
    app.run()