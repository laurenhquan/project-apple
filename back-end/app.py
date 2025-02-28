from flask import Flask, render_template, request, jsonify

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/get_image')
def get_image():
    rating = request.args.get('rating', default=1, type=int)
    image_path = f"../images/imagesrating_{rating}.png"
    return jsonify({"image": image_path})

if __name__ == '__main__':
    app.run(debug=True)
