A Simple CMS Project.

Features: 
	1.Posts:
		a)Anyone can see posts.
		b)Only logged in people can comment & Reply.
		c)There is an individual post page that opens when you click the title.
	
	2.Users:
		a)Users can Register/Login
		b)Users that Register are not active and admin must activate them.
		c)Also, registered users have the role of ‘subscriber’ so they can not access admin.
		d)Users can Comment/Reply ONLY If they are active.

	3.Admin:
		a)Admin can be accessed only if the user has role_id 1 in the database.
		!! IMPORTANT !! - ON REGISTRATION IF THE USER IS THE FIRST ONE BEING REGISTER WILL BECOME ADMIN
		AND ACTIVE. WE DO THAT BY CHECKING IF THE DATABASE IS EMPTY TO SEE IF THE REGISTRATION IS THE FIRST 
		HAPPENING!!
		b)Admin can Create/Edit/Delete Posts.
		c)Admin can create Categories which will be dynamically added in the dropdown.
		d)Admin can Create/Edit/Delete Users.
		e)Admin can approve/disapprove comments and delete them.
		f)Admin can also approve/disapprove replies of comments.
		g)There is a Media page that shows all the pictures used in the website and can be deleted.
		   So if an image is not being used it can be deleted…
	
	4.Extra - Notes:
		a)In admin/posts if you click the Title you can edit it.
		b)In admin/posts View Comments will get you on a page with selected post’s comments.
		c)In admin/comments the View Replies shows selected comment’s replies as well. 
		d)Also images can be used for users but admin must give it to them.

		
