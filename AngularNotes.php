<?php 

// HOW TO START //
1. Install Angular CLI
	-> npm install -g @angular/cli@latest

2. Create New Angular App
	-> ng new appname
	# whould you like to use routing -> yes
	# stylesheet -> scss

3. Angular Material
	-> ng add @angular/material
	# would you like to proceed -> yes
	# choose theme -> 
	# global typography -> yes
	# browser animation -> yes
	# when working with any angular material module, we need to first import it(api)

4. Run the App
	-> ng serve
	# http://localhost:4200/
	# src/app/app.component.html -> delete all except <router-outlet></router-outlet>
	-> ng serve --port 8080

5. Generate common module
	-> ng generate module modulename(layout)

6. Generate common components
	-> ng generate component componentname
	-> ng g c header # generate a component header 
	-> ng g c sidebar # generate a component sidebar 
	-> ng g c footer # generate a component footer 

7. Import the common module(layout) into App Module
	-> layout.module.ts # exports: [ HeaderComponent, SidebarComponent, FooterComponent ]
	-> src/app/app.module.ts # import { LayoutModule } from './layout/layout.module';  imports: [ BrowserModule, AppRoutingModule, MatSidenavModule, LayoutModule, BrowserAnimationsModule ],


// HOW TO GENERATE SERVICE //
	-> ng generate service servicename
	-> app.module.ts -> Import HttpClientModule
	-> user.service.ts 
		# import { HttpClient } from '@angular/common/http';
		# baseUrl: string = 'https://jsonplaceholder.cypress.io/';
		# constructor(private http: HttpClient) { }
		# listUsers() { return this.http.get(this.baseUrl + 'users'); }
	-> services goes to app.module.ts providers
		# example of ng generate service storage
		# import { StorageService } from './storage.service';
		# providers: [ StorageService ],

// WHAT IS ANGULAR PIPE //
	# It's like a predefined/built-in function like toUppercase and Date
	# Like a helper in vue

// HOW TO GENERATE PIPE //
	-> ng generate pipe pipename

-> [(ngModel)] # two way data binding
-> [ngModel] # read data

// CREATE A LAZY LOADING MODULE // 
	-> ng generate module customer --route customer --module app.module

// CREATE GUARD //	
	-> ng generate guard blockit 

// ROUTER SAMPLES //
	private router: Router,
	-> this.router.navigate(['home']).then(()=>{
       	window.location.reload();
       });

// EVENTS //
	(click)="functionName()"
	(keyup)="functionName()"
	(keyup.enter)="functionName()"
	<input type='text' #box (keyup)="functionName(box.value)"/>








