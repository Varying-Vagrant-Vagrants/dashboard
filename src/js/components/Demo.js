
const Demo = () => {
	return <>
	<section className="section" id="typography">
	  <h1 className="title"> Typography </h1>
	  <hr/>
	  <div className="columns">
	    <div className="column">
	      <h1 className="title is-1"> Title 1 </h1>
	      <h2 className="title is-2"> Title 2 </h2>
	      <h3 className="title is-3"> Title 3 </h3>
	      <h4 className="title is-4"> Title 4 </h4>
	      <h5 className="title is-5"> Title 5 </h5>
	      <h6 className="title is-6"> Title 6 </h6> </div>
	    <div className="column">
	      <h1 className="subtitle is-1"> Subtitle 1 </h1>
	      <h2 className="subtitle is-2"> Subtitle 2 </h2>
	      <h3 className="subtitle is-3"> Subtitle 3 </h3>
	      <h4 className="subtitle is-4"> Subtitle 4 </h4>
	      <h5 className="subtitle is-5"> Subtitle 5 </h5>
	      <h6 className="subtitle is-6"> Subtitle 6 </h6> </div>
	    <div className="column">
	      <h1 className="title"> Title </h1>
	      <h2 className="subtitle"> Subtitle </h2>
	      <p className="title is-1"> Title 1 </p>
	      <p className="subtitle is-3"> Subtitle 3 </p>
	      <p className="title is-2"> Title 2 </p>
	      <p className="subtitle is-4"> Subtitle 4 </p>
	      <p className="title is-3"> Title 3 </p>
	      <p className="subtitle is-5"> Subtitle 5 </p>
	    </div>
	  </div>
	</section>
	<section className="section" id="button">
	  <h1 className="title"> Button </h1>
	  <hr/>
	  <div className="columns">
	    <div className="column">
	      <div className="buttons">
	        <a className="button"> Button </a>
	        <a className="button is-white"> White </a>
	        <a className="button is-light"> Light </a>
	        <a className="button is-dark"> Dark </a>
	        <a className="button is-black"> Black </a>
	        <a className="button is-link"> Link </a>
	        <a className="button is-text"> Link </a>
	      </div>
	      <div className="buttons">
	        <a className="button is-primary"> Primary </a>
	        <a className="button is-info"> Info </a>
	        <a className="button is-success"> Success </a>
	        <a className="button is-warning"> Warning </a>
	        <a className="button is-danger"> Danger </a>
	      </div>
	      <div className="buttons">
	        <a className="button is-focused"> Focus </a>
	        <a className="button is-primary is-focused"> Focus </a>
	        <a className="button is-info is-focused"> Focus </a>
	        <a className="button is-success is-focused"> Focus </a>
	        <a className="button is-warning is-focused"> Focus </a>
	        <a className="button is-danger is-focused"> Focus </a>
	      </div>
	      <div className="buttons">
	        <a className="button is-hovered"> Hover </a>
	        <a className="button is-primary is-hovered"> Hover </a>
	        <a className="button is-info is-hovered"> Hover </a>
	        <a className="button is-success is-hovered"> Hover </a>
	        <a className="button is-warning is-hovered"> Hover </a>
	        <a className="button is-danger is-hovered"> Hover </a>
	      </div>
	      <div className="buttons">
	        <a className="button is-active"> Active </a>
	        <a className="button is-primary is-active"> Active </a>
	        <a className="button is-info is-active"> Active </a>
	        <a className="button is-success is-active"> Active </a>
	        <a className="button is-warning is-active"> Active </a>
	        <a className="button is-danger is-active"> Active </a>
	      </div>
	      <div className="buttons">
	        <a className="button is-loading"> Loading </a>
	        <a className="button is-primary is-loading"> Loading </a>
	        <a className="button is-info is-loading"> Loading </a>
	        <a className="button is-success is-loading"> Loading </a>
	        <a className="button is-warning is-loading"> Loading </a>
	        <a className="button is-danger is-loading"> Loading </a>
	      </div>
	      <p className="field">
	        <a className="button">
	          <span className="icon is-small">
	            <i className="fa fa-bold"> </i>
	          </span>
	        </a>
	        <a className="button">
	          <span className="icon is-small">
	            <i className="fa fa-italic"> </i>
	          </span>
	        </a>
	        <a className="button">
	          <span className="icon is-small">
	            <i className="fa fa-underline"> </i>
	          </span>
	        </a>
	        <a className="button">
	          <span className="icon">
	            <i className="fab fa-github"> </i>
	          </span>
	          <span> GitHub </span>
	        </a>
	        <a className="button is-primary">
	          <span className="icon">
	            <i className="fab fa-twitter"> </i>
	          </span>
	          <span> Twitter </span>
	        </a>
	        <a className="button is-success">
	          <span className="icon is-small">
	            <i className="fa fa-check"> </i>
	          </span>
	          <span> Save </span>
	        </a>
	        <a className="button is-danger is-outlined">
	          <span> Delete </span>
	          <span className="icon is-small">
	            <i className="fa fa-times"> </i>
	          </span>
	        </a>
	      </p>
	      <div className="field has-addons">
	        <p className="control">
	          <a className="button">
	            <span className="icon is-small">
	              <i className="fa fa-bold"></i>
	            </span>
	            <span>Bold</span>
	          </a>
	        </p>
	        <p className="control">
	          <a className="button">
	            <span className="icon is-small">
	              <i className="fa fa-italic"></i>
	            </span>
	            <span>Italic</span>
	          </a>
	        </p>
	        <p className="control">
	          <a className="button">
	            <span className="icon is-small">
	              <i className="fa fa-underline"></i>
	            </span>
	            <span>Underline</span>
	          </a>
	        </p>
	      </div>

	      <div className="field has-addons">
	        <p className="control">
	          <a className="button">
	            <span className="icon is-small">
	              <i className="fa fa-align-left"></i>
	            </span>
	            <span>Left</span>
	          </a>
	        </p>
	        <p className="control">
	          <a className="button">
	            <span className="icon is-small">
	              <i className="fa fa-align-center"></i>
	            </span>
	            <span>Center</span>
	          </a>
	        </p>
	        <p className="control">
	          <a className="button">
	            <span className="icon is-small">
	              <i className="fa fa-align-right"></i>
	            </span>
	            <span>Right</span>
	          </a>
	        </p>
	      </div>
	      <div className="buttons">
	        <a className="button is-rounded">Rounded</a>
	        <a className="button is-primary is-rounded">Rounded</a>
	        <a className="button is-link is-rounded">Rounded</a>
	        <a className="button is-info is-rounded">Rounded</a>
	        <a className="button is-success is-rounded">Rounded</a>
	        <a className="button is-danger is-rounded">Rounded</a>
	      </div>
	    </div>
	    <div className="column">
	      <div className="buttons">
	        <a className="button is-small"> Small </a>
	        <a className="button"> Normal </a>
	        <a className="button is-medium"> Medium </a>
	        <a className="button is-large"> Large </a>
	      </div>
	      <div className="buttons">
	        <a className="button is-outlined"> Outlined </a>
	        <a className="button is-primary is-outlined"> Outlined </a>
	        <a className="button is-info is-outlined"> Outlined </a>
	        <a className="button is-success is-outlined"> Outlined </a>
	        <a className="button is-danger is-outlined"> Outlined </a>
	      </div>
	      <div className="buttons notification is-primary">
	        <a className="button is-primary is-inverted is-outlined"> Invert Outlined </a>
	        <a className="button is-info is-inverted is-outlined"> Invert Outlined </a>
	        <a className="button is-success is-inverted is-outlined"> Invert Outlined </a>
	        <a className="button is-danger is-inverted is-outlined"> Invert Outlined </a>
	      </div>
	      <div className="buttons notification is-primary">
	        <a className="button is-primary is-inverted"> Inverted </a>
	        <a className="button is-info is-inverted"> Inverted </a>
	        <a className="button is-success is-inverted"> Inverted </a>
	        <a className="button is-danger is-inverted"> Inverted </a>
	      </div>
	      <p className="buttons">
	        <a className="button is-small">
	          <span className="icon is-small">
	            <i className="fab fa-github"> </i>
	          </span>
	          <span> GitHub </span>
	        </a>
	        <a className="button">
	          <span className="icon">
	            <i className="fab fa-github"> </i>
	          </span>
	          <span> GitHub </span>
	        </a>
	        <a className="button is-medium">
	          <span className="icon">
	            <i className="fab fa-github"> </i>
	          </span>
	          <span> GitHub </span>
	        </a>
	        <a className="button is-large">
	          <span className="icon is-medium">
	            <i className="fab fa-github"> </i>
	          </span>
	          <span> GitHub </span>
	        </a>
	      </p>
	      <p className="field">
	        <a className="button is-small">
	          <span className="icon is-small">
	            <i className="fa fa-heading"> </i>
	          </span>
	        </a>
	      </p>
	      <p className="field">
	        <a className="button">
	          <span className="icon is-small">
	            <i className="fa fa-heading"> </i>
	          </span>
	        </a>
	        <a className="button">
	          <span className="icon">
	            <i className="fa fa-heading fa-lg"> </i>
	          </span>
	        </a>
	      </p>
	      <p className="field">
	        <a className="button is-medium">
	          <span className="icon is-small">
	            <i className="fa fa-heading"> </i>
	          </span>
	        </a>
	        <a className="button is-medium">
	          <span className="icon">
	            <i className="fa fa-heading fa-lg"> </i>
	          </span>
	        </a>
	        <a className="button is-medium">
	          <span className="icon is-medium">
	            <i className="fa fa-heading fa-2x"> </i>
	          </span>
	        </a>
	      </p>
	      <p className="field">
	        <a className="button is-large">
	          <span className="icon is-small">
	            <i className="fa fa-heading"> </i>
	          </span>
	        </a>
	        <a className="button is-large">
	          <span className="icon is-medium">
	            <i className="fa fa-heading fa-lg"> </i>
	          </span>
	        </a>
	        <a className="button is-large">
	          <span className="icon is-large">
	            <i className="fa fa-heading fa-2x"> </i>
	          </span>
	        </a>
	      </p>
	    </div>
	  </div>
	</section>
	</>;
};


export default Demo;
