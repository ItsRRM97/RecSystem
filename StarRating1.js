
class StarRating extends HTMLElement{
	get value()
	{
		return this.getAttribute('value')||0;
	}
	set value(val)
	{
		this.setAttribute('value',val);
		this.highlight(this.value-1);
	}
	get number()
	{
		return this.getAttribute('number')||5;
	}
	set number(val)
	{
		this.setAttribute('number',val);
		this.stars=[];
		while(this.firstChild)
		{
			
			this.removeChild(this.firstChild);
		}
		for(let i=0;i<this.number;i++)
		{
			let s=document.createElement('div');
			s.className="star";
			this.appendChild(s);
			this.stars.push(s);
		}
		this.value=this.value;
		
	}
	highlight(index)
	{
		this.stars.forEach((star,i)=> {
			star.classList.toggle('full',i<=index);
			
		});
	}
	constructor()
	{
		super();
		this.number=this.number;
		
	}
	
}
window.customElements.define('x-star-rating',StarRating);