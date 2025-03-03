from flask import Flask, render_template, send_from_directory
import os

app = Flask(__name__, static_folder='front-end/pages')  # Serve static files from 'front-end/pages'

# Route for home page rendering the index.html
@app.route('/')
def home():
    return render_template('index.html')  # Make sure index.html is in 'back-end/templates'

if __name__ == '__main__':
    app.run(debug=True)
