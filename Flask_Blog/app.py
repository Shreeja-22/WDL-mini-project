from flask import Flask, render_template, request, redirect, url_for
app = Flask(__name__)

class Admin:
	def __init__(self, username, password):
		self.username = username
		self.password = password

	def __repr__(self):
		return f'<Admin: {self.username}>'

@app.route('/')
@app.route('/frontpage')
def frontpage():
    return render_template('frontpage.html')

@app.route('/adminlogin', methods=['GET','POST'])
def adminlogin():
	return render_template('adminlogin.html')

@app.route('/login')
def login():
    return render_template('login.html')

@app.route('/buy')
def buy():
    return render_template('buy.html')

@app.route('/buycart')
def buycart():
    return render_template('buycart.html')

@app.route('/profile')
def profile():
    return render_template('profile.html')

@app.route('/sell')
def sell():
    return render_template('sell.html')

@app.route('/sellcart')
def sellcart():
    return render_template('sellcart.html')

@app.route('/signup')
def signup():
    return render_template('signup.html')

@app.route('/buysell')
def buysell():
    return render_template('buysell.html')

@app.route('/finalpagebuy')
def finalpagebuy():
    return render_template('finalpagebuy.html')

@app.route('/finalpagesell')
def finalpagesell():
    return render_template('finalpagesell.html')
