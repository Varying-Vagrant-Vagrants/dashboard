import * as React from 'react';

const AddSiteForm = () => (
  <div className="box altbox">
    <form action="POST" method="">
      <h3>Add Site</h3>
      <p>
        <label htmlFor="vvv_site_add_name">Name
          <input id="vvv_site_add_name" type="text" title="WIP:Coming soon" disabled placeholder="site name" />
        </label>
      </p>
      <p>
        <label htmlFor="vvv_site_add_description">Description
          <input id="vvv_site_add_description" type="text" disabled placeholder="description" />
        </label>
      </p>
      <p>
        <label htmlFor="vvv_site_add_url">URL
          <input id="vvv_site_add_url" type="url" title="WIP:Coming soon" disabled placeholder="URL" />
        </label>
      </p>
      <input type="submit" title="WIP:Coming soon"disabled value="Update config file" />
    </form>
  </div>
);
// (PropTypes.object),
AddSiteForm.propTypes = {
};

AddSiteForm.defaultProps = {
};
export default AddSiteForm;
